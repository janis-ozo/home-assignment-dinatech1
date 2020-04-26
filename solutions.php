<?php

function maxProfit(array $pricesAndPurchases)
{
    //function to find highest price in input array
    function maxPrice (array $array):int
    {
        $maxPrice = 0;
        foreach ($array as $key => $value) {
            $maxPrice = max(array($maxPrice, $value['price']));

        }
        return $maxPrice;
    };

    $profit = 0;
    $spentMoney = 0;
    $purchasedItems = 0;
    $maxPrice = maxPrice($pricesAndPurchases);

    //looping trough array to calculate profit while array is empty.
    while (!empty($pricesAndPurchases))
    {
        $shifted = array_shift($pricesAndPurchases);
       if($shifted['price'] <= $maxPrice)
       {
           $spentMoney += $shifted['price'] * $shifted['purchased'];
           $purchasedItems += $shifted['purchased'];
       }

       $earnedMoney = $maxPrice * $purchasedItems;
       $profit += $earnedMoney - $spentMoney;

       $spentMoney = 0;
       $purchasedItems = 0;
       $maxPrice = maxPrice($pricesAndPurchases);

    }

    return $profit;
}

$data =   [
    0 => ['price' => 2, 'purchased' => 1],
    1 => ['price' => 8, 'purchased' => 1],
    2 => ['price' => 10, 'purchased' => 1],
    3 => ['price' => 4, 'purchased' => 1],
    4 => ['price' => 9, 'purchased' => 1]
];

//echo maxProfit($data);




function stringCost(string $a, string $b, int $insertionCost, int $deletionCost, int $replacementCost): int
{
    //inbuilt function levenshtein
    return levenshtein( $a, $b, $insertionCost, $deletionCost, $replacementCost );
}

    echo stringCost('', 'A', 1, 0, 0).PHP_EOL;
    echo  stringCost('a', 'A', 1, 1, 0).PHP_EOL;
    echo  stringCost('a', 'A', 1, 0, 2).PHP_EOL;




function incrementalMedian(array $values): array
{
    function quickSort($array)
    {
        $lowerEqual = $greater = array();
        if(count($array) < 2)
        {
            return $array;
        }
        $pivotKey = key($array);
        $pivot = array_shift($array);
        foreach($array as $val)
        {
            if($val <= $pivot)
            {
                $lowerEqual[] = $val;

            }elseif ($val > $pivot)
            {
                $greater[] = $val;

            }
        }
        return array_merge(quickSort($lowerEqual),array($pivotKey=>$pivot),quickSort($greater));
    }
    $medians = [];
    for($i = 1; $i<= count($values); $i++)
    {
        $select = array_slice($values, 0,$i);
        $sortedArray = quickSort($select);

        if(count($sortedArray) % 2 == 0)
        {
            $medians[] =$sortedArray[(count($sortedArray) / 2) - 1];
        }else
        {
            $medians[] = $sortedArray[count($sortedArray) / 2];
        }

    }



  return $medians;
}
$values = [1, 8, 4, 7, 13];

//$values = [1, 8, 4, 7];

var_dump(incrementalMedian($values));







