<?php

use Sodoku\Core\Grid\Grid;
use Sodoku\Core\Grid\GridSolver;


class GridSolverTest extends TestCase
{

    public function testCheckGrid()
    {
        $sudoku = new GridSolver();
        $grid = [
           [0,0,0,6,0,0,0,0,5],
           [0,0,1,0,0,0,0,0,0],
           [0,0,0,2,0,0,0,0,1],
           [0,0,0,0,0,0,0,0,0],
           [7,0,0,0,4,0,0,0,0],
           [0,0,0,3,0,0,5,0,0],
           [0,0,0,0,0,0,0,0,0],
           [8,0,0,0,3,0,9,0,0],
           [0,0,2,0,0,0,0,0,0],
        ];

        $this->assertTrue($sudoku->checkGrid($grid));

        $grid[0][0] = 5;
        $this->assertFalse($sudoku->checkGrid($grid));

        $grid[1][1] = 5;
        $this->assertFalse($sudoku->checkGrid($grid));
    }


    public function testGridPossibilities()
    {
        $sudoku = new GridSolver();
        $grid = [
           [0,0,0,6,0,0,0,0,5],
           [0,0,1,0,0,0,0,0,0],
           [0,0,0,2,0,0,0,0,1],
           [0,0,0,0,0,0,0,0,0],
           [7,0,0,0,4,0,0,0,0],
           [0,0,0,3,0,0,5,0,0],
           [0,0,0,0,0,0,0,0,0],
           [8,0,0,0,3,0,9,0,0],
           [0,0,2,0,0,0,0,0,0],
        ];

        $this->assertCount(
            7,
            $sudoku->getPossibilities($grid, 1, 8)
        );
    }


    public function testSolveGrid()
    {
        $sudoku = new GridSolver();
        $grid = Grid::getEmptyGrid();

        // fill line 1
        $grid[0]['cols'][1]['value'] = '7';
        $grid[0]['cols'][2]['value'] = '6';
        $grid[0]['cols'][4]['value'] = '1';
        $grid[0]['cols'][7]['value'] = '4';
        $grid[0]['cols'][8]['value'] = '3';
        // fill line 2
        $grid[1]['cols'][3]['value'] = '7';
        $grid[1]['cols'][5]['value'] = '2';
        $grid[1]['cols'][6]['value'] = '9';
        // fill line 3
        $grid[2]['cols'][1]['value'] = '9';
        $grid[2]['cols'][5]['value'] = '6';
        // fill line 4
        $grid[3]['cols'][4]['value'] = '6';
        $grid[3]['cols'][5]['value'] = '3';
        $grid[3]['cols'][6]['value'] = '2';
        $grid[3]['cols'][8]['value'] = '4';
        // fill line 5
        $grid[4]['cols'][0]['value'] = '4';
        $grid[4]['cols'][1]['value'] = '6';
        $grid[4]['cols'][7]['value'] = '1';
        $grid[4]['cols'][8]['value'] = '9';
        // fill line 6
        $grid[5]['cols'][0]['value'] = '1';
        $grid[5]['cols'][2]['value'] = '5';
        $grid[5]['cols'][3]['value'] = '4';
        $grid[5]['cols'][4]['value'] = '2';
        // fill line 7
        $grid[6]['cols'][3]['value'] = '2';
        $grid[6]['cols'][7]['value'] = '9';
        // fill line 8
        $grid[7]['cols'][2]['value'] = '4';
        $grid[7]['cols'][3]['value'] = '8';
        $grid[7]['cols'][5]['value'] = '7';
        $grid[7]['cols'][8]['value'] = '1';
        // fill line 9
        $grid[8]['cols'][0]['value'] = '9';
        $grid[8]['cols'][1]['value'] = '1';
        $grid[8]['cols'][4]['value'] = '5';
        $grid[8]['cols'][6]['value'] = '7';
        $grid[8]['cols'][7]['value'] = '2';

        $sudoku->setGrid($grid);
        $new_grid = $sudoku->solveGrid();
        $this->assertTrue($new_grid['success']);
    }
}
