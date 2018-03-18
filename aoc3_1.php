<?php

    // Assignment 3: Part 1

    $link = 'http://adventofcode.com/2017/day/3';
    $input = '277678';

    // Determine the number of blocks in the matrix
    $blocks = sqrt($input);
    $blocks_rounded_down = floor($blocks);
    $blocks_decimal = $blocks - $blocks_rounded_down;
    $blocks_rounded_up = ceil($blocks);

    // One of the edges will be "full" - i.e., the range will be completed, but the other one will not necessarily be. It does not matter to us which.
    $blocks_from_edge = $blocks_rounded_up * $blocks_rounded_up - $input;

    // Since which one is the full edge does not matter to us, we will use X as full and Y as possibly not full.
    $matrix_center_x = floor($blocks_rounded_up / 2) + 1;
    $matrix_center_y = floor($blocks_rounded_up / 2) + 1 - $blocks_from_edge;
    $final = ($matrix_center_x - 1) + ($matrix_center_y - 1);

    // Output.
    echo '
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h1>ASSIGNMENT 3 - PART 1</h1>
                <h2>Link:</h2>'
                . $link . '
                <h2>Solve:</h2>
                While this is very space-efficient (no squares are skipped), requested data must be carried back to square 1 (the location of the only access port for this memory system) by programs that can only move up, down, left, or right. They always take the shortest path: the Manhattan Distance between the location of the data and square 1. How many steps are required to carry the data from the square identified in your puzzle input all the way to the access port?
            </div>
        </p>
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h2>Input:</h2>
                ' . $input . '
                <h2>Solution:</h2>
                ' . $final . '
            </div>
        </p>
    ';

?>
