@php
    function handler1($arg, $symb)
    {
        $s = $symb == 1 ? ': &nbsp' : '';
        echo "<div style='display:inline-block'>";
        foreach ($arg as $key) {
            if ($symb == 1) {
                $key2 = ucfirst($key);
                $str = $key;
                $key2 =
                    mb_convert_case(mb_substr($str, 0, 1), MB_CASE_UPPER, 'UTF-8') .
                    mb_convert_case(mb_substr($str, 1, mb_strlen($str) - 1), MB_CASE_LOWER, 'UTF-8');
                echo $key2 . $s . '</br>';
            }
            if ($symb == 0) {
                echo $key . $s . '</br>';
            }
        }
        echo '</div>';
    }
@endphp
