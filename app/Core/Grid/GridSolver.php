<?php
namespace Sodoku\Core\Grid;


/**
 * GridSolver
 * The code uses a backtracking algorithm to solve grid.
 */
class GridSolver
{

    /**
     * @var array
    */
    private $_grid = array();

    /**
     * @var array
    */
    private $_list = array();


    public function __construct($input = array())
    {
        $this->_grid = $input;
        $this->_list = range(0, 8);
    }


    /**
     * Get grid
     *
     * @return array
     */
    public function getGrid()
    {
        return $this->_grid;
    }


    /**
     * Set grid
     *
     * @param array $grid
     * @return GridSolver
     */
    public function setGrid($grid = array()) {
        $this->_grid = $grid;
        return $this;
    }

    /**
     * Check and solve grid
     *
     * @return array
     */
    public function solveGrid()
    {
        $data = $this->formateGrid();
        $is_valid = $this->checkGrid($data);

        if (!$is_valid) {
            return [
                'success' => $is_valid,
                'grid'    => $this->getGrid(),
            ];
        }

        $new_grid = $this->solve($data);

        return [
            'success' => $is_valid,
            'grid'    => $this->toAngularJsGrid($new_grid),
        ];
    }


    /**
     * formate grid
     * The output should be like:
     *
     *  $grid = [
     *      [0,0,0,6,0,0,0,0,5],
     *      [0,0,1,0,0,0,0,0,0],
     *      [0,0,0,2,0,0,0,0,1],
     *      [0,0,0,0,0,0,0,0,0],
     *      [7,0,0,0,4,0,0,0,0],
     *      [0,0,0,3,0,0,5,0,0],
     *      [0,0,0,0,0,0,0,0,0],
     *      [8,0,0,0,3,0,9,0,0],
     *      [0,0,2,0,0,0,0,0,0],
     *  ];
     *
     * @return array
     */
    private function formateGrid()
    {
        $base_grid = $this->getGrid();
        $new_grid = array();

        foreach ($this->_list as $l) {
            $rows = array();
            foreach ($this->_list as $c) {
                if (!array_key_exists('value', $base_grid[$l]['cols'][$c])) {
                    $rows[] = 0;
                } else {
                    $value = $base_grid[$l]['cols'][$c]['value'];
                    $rows[] = empty($value) ? 0 : (int) $value;
                }
            }

            $new_grid[] = $rows;
        }

        return $new_grid;
    }

    /**
     * Check grid is valid or no
     *
     * @param formated_grid
     * @return boolean
     */
    public function checkGrid($formated_grid)
    {
        // Check lines and columns
        foreach ($this->_list as $l) {
            $cols = $lines = array();
            foreach ($this->_list as $c) {
                if ($formated_grid[$l][$c] != 0) {
                    $lines[] = $formated_grid[$l][$c];
                }
                if ($formated_grid[$c][$l] != 0) {
                    $cols[] = $formated_grid[$c][$l];
                }
            }

            if (($lines && max(array_count_values($lines)) > 1)
              || ($cols && max(array_count_values($cols)) > 1)) {
                return false;
            }
        }

        // Check bloc
        foreach (array(0, 3, 6) as $line) {
            foreach (array(0, 3, 6) as $col) {
                $invalid = array_merge(
                    array_slice($formated_grid[$line], $col, 3),
                    array_slice($formated_grid[$line + 1], $col, 3),
                    array_slice($formated_grid[$line + 2], $col, 3)
                );

                $invalid = array_filter($invalid);
                if (($invalid && max(array_count_values($invalid)) > 1)) {
                    return false;
                }
            }
        }

        return true;
    }


    /**
     * Modif original grid with solved data
     *
     * @param grid
     * @return array
     */
    private function toAngularJsGrid($grid)
    {
        $base_grid = $this->getGrid();

        foreach ($this->_list as $l) {
            foreach ($this->_list as $c) {
                if (!array_key_exists('value', $base_grid[$l]['cols'][$c])) {
                    $base_grid[$l]['cols'][$c]['value'] = '';
                }
                if ($base_grid[$l]['cols'][$c]['value'] == '') {
                    $base_grid[$l]['cols'][$c]['value'] = $grid[$l][$c];
                } else {
                    $base_grid[$l]['cols'][$c]['input_class'] = 'inputcell';
                }
            }
        }

        return $base_grid;
    }


    /**
     * Check possibilities
     *
     * @param grid
     * @param row_index
     * @param col_index
     * @return array
     */
    public function getPossibilities($grid, $row_index, $col_index)
    {
        $valid = range(1, 9);
        $invalid = $grid[$row_index];

        foreach ($this->_list as $i) {
            $invalid[] = $grid[$i][$col_index];
        }

        $box_row = $row_index % 3 == 0 ? $row_index : $row_index - $row_index % 3;
        $box_col = $col_index % 3 == 0 ? $col_index : $col_index - $col_index % 3;

        $invalid = array_unique(array_merge(
            $invalid,
            array_slice($grid[$box_row], $box_col, 3),
            array_slice($grid[$box_row + 1], $box_col, 3),
            array_slice($grid[$box_row + 2], $box_col, 3)
        ));

        $valid = array_diff($valid, $invalid);
        shuffle($valid);
        return $valid;
    }


    /**
     * Solve Grid
     *
     * @param grid
     * @return array
     */
    private function solve($grid)
    {
        $options = array();

        foreach ($grid as $rowIndex => $row) {
            foreach ($row as $columnIndex => $cell) {
                if (empty($cell)) {
                    $options[] = array(
                        'rowIndex' => $rowIndex,
                        'columnIndex' => $columnIndex,
                        'permissible' => $this->getPossibilities($grid, $rowIndex, $columnIndex)
                    );
                }
            }
        }

        if (count($options) == 0) {
            return $grid;
        }

        foreach ($options[0]['permissible'] as $value) {
            $grid[$options[0]['rowIndex']][$options[0]['columnIndex']] = $value;
            if ($result = $this->solve($grid)) {
                return $result;
            }
        }
    }

}
