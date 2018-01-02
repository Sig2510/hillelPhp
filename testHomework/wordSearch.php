<?php
  //require('index.php');

//  class WordSearchTest
  //{

      function charPosition($board, $char){
        $position = [];
        for ($i=0; $i < count($board); $i++) {
          for ($j=0; $j < count($board[$i]); $j++) {
            if($char == $board[$i][$j]){
              $position[$i] = $j;
            }
          }
        }
        var_dump($position);
        return $position;
      }

      function testWordSearch($str)
      {
          $board = [
              ['a', 'b', 'c', 'd'],
              ['d', 'k', 'l', 'm'],
              ['m', 'f', 'b', 's']
          ];

          $strArray = str_split($str);

          $strLength = count($strArray);
          $firstChar = $strArray[0];

          for($q = 0; $q < $strLength; $q++){
            $countChars = 0;
            for($t = 0; $t < $strLength; $t++){
              if($strArray[$q] == $strArray[$t]){
                $countChars++;
              }
            }
            if($countChars > 1){
              return "Same letter twice";
            }
          }

          $charCount = 0;

          foreach ($board as $key => $value) {
            if($value == $firstChar){
              $charCount++;
            }
          }

          $startPosition = charPosition($board, $firstChar);
          var_dump($startPosition);
          if($startPosition == null){
            return "Start position isn't finded";
          }

          $board_y_length = count($board) - 1;
          $board_x_length = count($board[0]) - 1;

          $result = 'TRUE';

          foreach ($startPosition as $key => $value) {
            $y = $key;
            $x = $value;
            var_dump($y);
            var_dump($x);

            $result = 'TRUE';

            for ($i = 1; $i < $strLength; $i++) {
              if($y == 0){
                if($x == 0){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x +=1;
                    continue;
                  } else if( $strArray[$i] == $board[$y+1][$x]){
                    $y +=1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
                if($x == $board_x_length){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y][$x-1]){
                    $x -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y+1][$x]){
                    $y += 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
                if($x > 0 & $x < $board_x_length){
                  if($strArray[$i] == $board[$y][$x-1]){
                    $x -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y+1][$x]){
                    $y += 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
              }
              if($y == $board_y_length){
                if($x == 0){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y-1][$x]){
                    $y -= 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
                if($x == $board_x_length){
                  if($strArray[$i] == $board[$y-1][$x]){
                    $y -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y][$x-1]){
                    $x -= 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
                if($x > 0 & $x < $board_x_length){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y][$x-1]){
                    $x -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y-1][$x]){
                    $y -= 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
              }
              if($y > 0 & $y < $board_y_length){
                if($x == 0){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y-1][$x]){
                    $y -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y+1][$x]){
                    $y += 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
                if($x == $board_x_length){
                  if($strArray[$i] == $board[$y-1][$x]){
                     $y -= 1;
                     continue;
                   } else if($strArray[$i] == $board[$y][$x-1]){
                     $x -= 1;
                     continue;
                   } else if($strArray[$i] == $board[$y+1][$x]){
                     $y += 1;
                     continue;
                   } else {
                     $result = 'FALSE';
                   }
                }
                if($x > 0 & $y < $board_x_length){
                  if($strArray[$i] == $board[$y][$x+1]){
                    $x += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y][$x-1]){
                    $x -= 1;
                    continue;
                  } else if($strArray[$i] == $board[$y+1][$x]){
                    $y += 1;
                    continue;
                  } else if($strArray[$i] == $board[$y-1][$x]){
                    $y -= 1;
                    continue;
                  } else {
                    $result = 'FALSE';
                  }
                }
              }
            }
          }


          return $result;


          // Word can be constructed form letters of sequentially adjacent cell,
          // where 'adjacent' cells are those horizontally or vertically neighboring.

          /*$this->assertTrue(searchWord($board, 'admfbl'));
          $this->assertTrue(searchWord($board, 'smdc'));
          $this->assertTrue(searchWord($board, 'dklm'));
          // words that doesn't exists
          $this->assertFalse(searchWord($board, 'dlm'));
          $this->assertFalse(searchWord($board, 'smdb'));
          // It's not allowed to use the same letter twice
          $this->assertFalse(searchWord($board, 'abcc'));
          $this->assertFalse(searchWord($board, 'dklml'));
          // Full board
          $this->assertTrue(searchWord($board, 'abcdmlkdmfbs'));
          */
      }
      var_dump(testWordSearch('abcdmlkdmfbs'));
  //}
