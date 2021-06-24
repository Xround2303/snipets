<?

######### CURL #########

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);



######### PHONE CLEAR #########

$phone = preg_replace('/[^0-9]/', '', $phone);
$phone = mb_substr($phone, 0, strlen($phone));
return $phone;
  



######### PHONE FORMAT TO MASK #########
$this->phoneFormat("79853331626", [11 => '+# (###) ###-##-##'], "#");
public function phoneFormat($phone, $format, $mask = '#')
{
 	$phone = preg_replace('/[^0-9]/', '', $phone);

    if (is_array($format)) {
        if (array_key_exists(strlen($phone), $format)) {
            $format = $format[strlen($phone)];
        } else {
            return false;
        }
    }

    $pattern = '/' . str_repeat('([0-9])?', substr_count($format, $mask)) . '(.*)/';

    $format = preg_replace_callback(
        str_replace('#', $mask, '/([#])/'),
        function () use (&$counter) {
            return '${' . (++$counter) . '}';
        },
        $format
    );

    return ($phone) ? trim(preg_replace($pattern, $format, $phone, 1)) : false;   
}