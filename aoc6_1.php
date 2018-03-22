<?php

    // Assignment 6 - Part 1

    $link = 'http://adventofcode.com/2017/day/6';
    $input = '4	1	15	12	0	9	9	5	5	8	7	3	14	5	12	3';
    $history = array();
    $total_steps = 0;
    $split = explode("\t", $input);

    // Repeat until we find one that was seen before.
    while (!in_array($split, $history)) {
        $history[] = $split;
        $maximum = max($split);

        // Build up array keys of all items having the largest value.
        $key = array_keys(
            array_filter($split, function($highest) use ($maximum) {
                return $highest == $maximum;
            })
        );

        // Get the value of the highest array key. We are interested in the first match.
        $key = reset($key);
        $split[$key] = 0;

        // Repeat until we have divided all the items.
        while ($maximum) {
            $key = ($key + 1) % count($split);
            $split[$key]++;
            $maximum--;
        }
        $total_steps++;
    }
    echo '
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h1>ASSIGNMENT 6 - PART 1</h1>
                <h2>Link:</h2>'
                . $link . '
                <h2>Solve:</h2>
                Given the initial block counts in your puzzle input, how many redistribution cycles must be completed before a configuration is produced that has been seen before?
            </div>
        </p>
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h2>Input:</h2>'
                . $input . '
                <h2>Solution:</h2>'
                . $total_steps . '
            </div>
        </p>
    ';

?>