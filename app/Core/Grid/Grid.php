<?php
namespace Sodoku\Core\Grid;


/**
 * Grid
 *
 */
class Grid
{
    /**
     * generate empty grid
     *
     * @return array
     */
    public static function getEmptyGrid()
    {
        return [
            [
                "id" => 1,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  gt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  gt  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 2,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 3,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  bb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 4,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  bt  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 5,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 6,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  bb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  bb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 7,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  bt  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  bt  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 8,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  cb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  cb", "input_class" => "cell", "value" => ""],
                ],
            ],
            [
                "id" => 9,
                "cols"  => [
                    ["id" => 1, "class" => "gl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 2, "class" => "cl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 3, "class" => "cl  br  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 4, "class" => "bl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 5, "class" => "cl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 6, "class" => "cl  br  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 7, "class" => "bl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 8, "class" => "cl  cr  ct  gb", "input_class" => "cell", "value" => ""],
                    ["id" => 9, "class" => "cl  gr  ct  gb", "input_class" => "cell", "value" => ""],
                ],
            ],
        ];
    }
}