<?php

    // Assignment 6 - Part 2

    $link = 'http://adventofcode.com/2017/day/6';
    $input = '4	1	15	12	0	9	9	5	5	8	7	3	14	5	12	3';
    $history = array();
    $total_steps = 0;
    $split = explode("\t", $input);

    // Repeat until we find one that was seen before, as well as the next occurrence. Essentially the same as AOC 6.1, but with extra step.
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

    // Find the size of the loop.
    $next = array_keys(
        array_filter($history, function($highest) use ($split) {
            return $highest == $split;
        })
    );
    $next = reset($next);
    $size = $total_steps - $next;
    echo '
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h1>ASSIGNMENT 6 - PART 2</h1>
                <h2>Link:</h2>'
                . $link . '
                <h2>Solve:</h2>
                Out of curiosity, the debugger would also like to know the size of the loop: starting from a state that has already been seen, how many block redistribution cycles must be performed before that same state is seen again? How many cycles are in the infinite loop that arises from the configuration in your puzzle input?
            </div>
        </p>
        <p>
            <div style="padding: 20px; background-color: #eee; height: auto; width: 90%; overflow: auto">
                <h2>Input:</h2>'
                . $input . '
                <h2>Solution:</h2>'
                . $size . '
            </div>
        </p>
    ';

?>