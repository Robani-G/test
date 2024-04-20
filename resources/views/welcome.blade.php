@php
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '', trim($num));
    if (! $num) {
        return false;
    }

    $num_parts = explode('.', $num, 2);
    $num = $num_parts[0];
    $cents = isset($num_parts[1]) ? (string)$num_parts[1] : '';

    $num = ltrim($num, '0');

    $words = array();
    $list1 = array('', 'አንድ', 'ሁለት', 'ሶስት ', 'አራት', 'አምስት', 'ስድስት', 'ሰባት', 'ስምንት', '	ዘጠኝ ', 'አስር', 'አስራ አንድ',
        '	አስራ ሁለት', 'አስራ ሶስት', 'አስራ አራት', 'አስራ አምስት', 'አስራ ስድስት', 'አስራ ሰባት', 'አስራ ስምንት', 'አስራ ዘጠኝ '
    );
    $list2 = array('', 'አስር ', 'ሀያ  ', 'ሰላሳ', '	አርባ ', 'ሀምሳ', 'ስልሳ', 'ሰባ ', '	ሰማንያ ', '	ዘጠና', 'መቶ ');
    $list3 = array('', 'ሺ', 'ሚሊየን', 'ቢሊየን');

    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);

    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' መቶ' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
    }
if($cents>99)
{
    return false;
}
else
    $cents_words = '';
    if (!empty($cents)) {
        $cents_words =  convertNumberToWord($cents) .'ሳንቲም';
    }

    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }

    $result = implode(' ', $words);
    if (!empty($cents_words)) {
        $result .= 'ከ' . $cents_words;
    }

    return $result;
}

$num = "006030000.0";
$words = convertNumberToWord($num);
echo $words;



@endphp

