'use strict';

angular.module('Sudoku.grid', ['ngResource'])

    .controller('GridCtrl', ['$scope', 'GridInit', 'GridSolve',
        function($scope, GridInit, GridSolve) {

        GridInit.query().$promise.then(function(results) {
            $scope.base_grid = angular.copy(results.grid);
            $scope.grid = angular.copy(results.grid);
            $scope.possibilities = {};
        });

        $scope.clear = function() {
            $scope.grid = angular.copy($scope.base_grid);
            $scope.possibilities = {};
            $.notify("The grid have been successfully cleared !", "success");
        };

        $scope.solve = function() {
            GridSolve.solve(angular.copy($scope.grid)).$promise.then(function(results) {
                $scope.possibilities = {};
                $scope.grid = results.grid;
                if (results.success == true) {
                    $.notify("The grid have been successfully solved !", "success");
                } else {
                    $.notify("The grid can't be solved !", "error");
                }
            });
        };

        $scope.check_possibilities = function(row_id, column_id) {
            row_id = row_id - 1;
            column_id = column_id - 1;
            var pos = _getPossibilities($scope.grid, row_id, column_id);
            $scope.possibilities = {
                row: row_id,
                column: column_id,
                pos: angular.copy(pos)
            };
        };

        $scope.choose_pos = function(index, row_id, column_id) {
            $scope.grid[row_id].cols[column_id].value = $scope.possibilities.pos[index];
        }


        function _getPossibilities(rows, rowId, columnId) {
            var valid = [1,2,3,4,5,6,7,8,9];
            var invalid = [];

            for(var i = 0; i < 9; i++) {
                var raw_value = rows[rowId].cols[i].value;
                var col_value = rows[i].cols[columnId].value;


                if (raw_value != null && invalid.indexOf(raw_value) == -1) {
                    invalid.push(raw_value);
                }
                if (col_value  != null && invalid.indexOf(col_value) == -1) {
                    invalid.push(col_value);
                }
            }

            var box_row = rowId % 3 == 0 ? rowId : rowId - rowId % 3;
            var box_col = columnId % 3 == 0 ? columnId : columnId - columnId % 3;

            for(var i = 0; i < 3; i++) {
                for(var j = 0; j < 3; j++) {
                    var val = rows[box_row + i].cols[box_col + j].value;
                    if (val  != null && invalid.indexOf(val) == -1) {
                        invalid.push(val);
                    }
                }
            }

            return $(valid).not(invalid).get();
        }

    }]).factory('GridSolve', ['$resource', function($resource) {
        return $resource("api/grid/solve", {}, {
            solve: {method: 'POST'}
        });
    }]).factory('GridInit', ['$resource', function ($resource) {
        return $resource("api/grid/init", {}, {
            query: {method: 'GET', isArray: false}
        });
    }]);
