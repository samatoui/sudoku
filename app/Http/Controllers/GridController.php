<?php

namespace Sodoku\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use File;

use Sodoku\Core\Grid\Grid;
use Sodoku\Core\Grid\GridSolver;


class GridController extends BaseController
{
    /**
     * Generate empty grid.
     * @param  None
     * @return Response
     */
    public function getEmptyGrid()
    {
        return response()->json(array('grid' => Grid::getEmptyGrid()), 201);
    }


    /**
     * download grid.
     * @param  request
     * @return response
     */
    public function downloadGrid(Request $request)
    {
        if ($request->isMethod('post')) {
            $grid = json_encode($request->all(), JSON_PRETTY_PRINT);

            $file_name = 'grid.json';
            $destination_path = public_path().'/temp/';
            $file_path = $destination_path.$file_name;

            if (!is_dir($destination_path)) {
                mkdir($destination_path, 0777, true);
            }
            File::put($file_path, $grid);

            return response()->download($file_path, 'grid.json',[
                'Content-Type' => 'application/json',
                'Content-disposition' => 'attachment; filename=grid.json']);
        }
    }


    /**
     * Solve grid.
     * @param  request
     * @return Response
     */
    public function solveGrid(Request $request)
    {
        if ($request->isMethod('post')) {
            $grid_solver = new GridSolver($request->all());
            return response()->json($grid_solver->solveGrid(), 201);
        }
    }
}
