<!DOCTYPE html>
<html lang="en" ng-app="Sudoku">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sudoku</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/sudoku.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="/js/lib/jquery.min.js"></script>
        <script src="/js/lib/bootstrap.min.js"></script>

        <!-- Angular JavaScript -->
        <script src="js/lib/angularjs-1.3.3/angular.min.js"></script>
        <script src="js/lib/angularjs-1.3.3/angular-animate.min.js"></script>
        <script src="js/lib/angularjs-1.3.3/angular-cookies.min.js"></script>
        <script src="js/lib/angularjs-1.3.3/angular-resource.min.js"></script>
        <script src="js/lib/angularjs-1.3.3/angular-route.min.js"></script>
        <script src="js/lib/angularjs-1.3.3/angular-sanitize.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="js/lib/jquery.easing.min.js"></script>
        <script src="js/lib/notify.js"></script>

        <!-- Custom Angular JavaScript -->
        <script src="js/app.js"></script>
        <script src="js/grid.js"></script>
    </head>

    <body ng-controller="GridCtrl">
        <div class="container">

            <div class="header clearfix">
                <nav></nav>
                <h3 class="text-muted">Sudoku project</h3>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <table>
                        <tr ng-repeat="possibility in possibilities.pos">
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-info"
                                    ng-click="choose_pos($index, possibilities.row, possibilities.column)">
                                    [[possibility]]
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <table id="sudoku-grid" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr></tr>
                            <tr ng-repeat="row in grid">
                                <td ng-repeat="column in row.cols" class="[[column.class]]">
                                    <div id="boxdiv">
                                        <input
                                            ng-model="column.value"
                                            ng-click="check_possibilities(row.id, column.id)"
                                            maxlength="1"
                                            class="[[column.input_class]]"
                                            value="column.value"
                                            type="number"
                                            name="cell-[[row.id]][[column.id]]">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <button class="btn btn-primary btn-block" ng-click="clear()">
                            <i class="glyphicon glyphicon-off"></i> Clear
                        </button>
                        <button class="btn btn-success btn-block" ng-click="solve()"><i
                                class="glyphicon glyphicon-ok-sign"></i> Solve
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </body>

</html>
