<?php
/*
PHP Conditional Statements and Loops Notes with Examples
Author: Your Name
*/

// 1. if Statement
echo "=== if Statement ===\n";
$age = 20;
if ($age >= 18) {
    echo "You are an adult.\n";
}

// 2. if-else Statement
echo "\n=== if-else Statement ===\n";
$marks = 65;
if ($marks >= 50) {
    echo "You passed the exam.\n";
} else {
    echo "You failed the exam.\n";
}

// 3. if-elseif-else Statement
echo "\n=== if-elseif-else Statement ===\n";
$score = 85;
if ($score >= 90) {
    echo "Grade: A+\n";
} elseif ($score >= 80) {
    echo "Grade: A\n";
} elseif ($score >= 70) {
    echo "Grade: B\n";
} else {
    echo "Grade: C\n";
}

// 4. switch-case Statement
echo "\n=== switch-case Statement ===\n";
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Start of the work week.\n";
        break;
    case "Friday":
        echo "End of the work week.\n";
        break;
    default:
        echo "Midweek days.\n";
}

// 5. Loops
echo "\n=== while Loop ===\n";
$count = 1;
while ($count <= 5) {
    echo "Count: $count\n";
    $count++;
}

echo "\n=== do-while Loop ===\n";
$num = 1;
do {
    echo "Number: $num\n";
    $num++;
} while ($num <= 5);

echo "\n=== for Loop ===\n";
for ($i = 1; $i <= 5; $i++) {
    echo "Iteration: $i\n";
}

echo "\n=== foreach Loop ===\n";
$fruits = ["Apple", "Banana", "Cherry"];
foreach ($fruits as $fruit) {
    echo "Fruit: $fruit\n";
}

// 6. break and continue
echo "\n=== break Example ===\n";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break; // Stop the loop
    }
    echo "Number: $i\n";
}

echo "\n=== continue Example ===\n";
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue; // Skip iteration
    }
    echo "Number: $i\n";
}

// ==============================
// 20 Practice Questions with Answers
// ==============================

echo "\n=== 20 Practice Questions & Answers ===\n";

// Q1: Check if a number is positive.
$num = 5;
echo ($num > 0) ? "Positive\n" : "Not Positive\n";

// Q2: Check if a number is even or odd.
$num = 4;
echo ($num % 2 == 0) ? "Even\n" : "Odd\n";

// Q3: Determine largest of two numbers.
$a = 10; $b = 20;
echo ($a > $b) ? "$a\n" : "$b\n";

// Q4: Print 1 to 10 using for loop.
for ($i = 1; $i <= 10; $i++) echo "$i ";

// Q5: Sum numbers from 1 to 100.
$sum = 0;
for ($i = 1; $i <= 100; $i++) $sum += $i;
echo "\nSum: $sum\n";

// Q6: Multiplication table of 5.
for ($i = 1; $i <= 10; $i++) echo "5 x $i = " . (5*$i) . "\n";

// Q7: Factorial of 5.
$fact = 1;
for ($i = 1; $i <= 5; $i++) $fact *= $i;
echo "Factorial: $fact\n";

// Q8: Reverse a string using for loop.
$str = "PHP";
$rev = "";
for ($i = strlen($str)-1; $i >= 0; $i--) $rev .= $str[$i];
echo "Reverse: $rev\n";

// Q9: Count vowels in a string.
$str = "Hello World";
$count = 0;
foreach (str_split(strtolower($str)) as $char) {
    if (in_array($char, ['a','e','i','o','u'])) $count++;
}
echo "Vowel Count: $count\n";

// Q10: Print even numbers from 1 to 20.
for ($i = 1; $i <= 20; $i++) if ($i % 2 == 0) echo "$i ";

// Q11: Check leap year.
$year = 2024;
echo ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) ? "\nLeap Year\n" : "\nNot Leap Year\n";

// Q12: Find largest in an array.
$arr = [10, 25, 5, 90];
echo "Max: " . max($arr) . "\n";

// Q13: Find smallest in an array.
echo "Min: " . min($arr) . "\n";

// Q14: Sum of array elements.
echo "Array Sum: " . array_sum($arr) . "\n";

// Q15: Search value in array.
echo in_array(25, $arr) ? "Found\n" : "Not Found\n";

// Q16: Print array values using foreach.
foreach ($arr as $value) echo "$value ";

// Q17: Skip number 3 using continue.
for ($i = 1; $i <= 5; $i++) { if ($i == 3) continue; echo "\n$i"; }

// Q18: Break loop when number is 4.
for ($i = 1; $i <= 5; $i++) { if ($i == 4) break; echo "\n$i"; }

// Q19: Print multiplication table from 1 to 3.
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        echo "$i x $j = " . ($i*$j) . "\n";
    }
}

// Q20: Calculate average of array values.
echo "Average: " . (array_sum($arr)/count($arr)) . "\n";
?>
