<?php

if (! function_exists('unique_random')) {
    /**
     * Generate a unique random string of characters
     * uses str_random() helper for generating the random string.
     *
     * @param     $table - name of the table
     * @param     $col   - name of the column that needs to be tested
     * @param int $chars - length of the random string
     *
     * @return string
     */
    function unique_random($table, $col, $chars = 6)
    {
        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';

        do {
            // Generate random string of characters
            //$random = strtoupper(str_random($chars));
            $charactersLength = mb_strlen($characters);

            $randomString = '';

            for ($i = 0; $i < $chars; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $random = $randomString;

            // Check if it's already testing
            // If so, don't query the database again
            if (in_array($random, $tested, true)) {
                continue;
            }

            // Check if it is unique in the database
            $count = DB::table($table)->where($col, '=', $random)->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if (0 === $count) {
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters
        } while (! $unique);

        return $random;
    }
}
