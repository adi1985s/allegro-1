<?php
    $items = $data['items'];

    $output = '<table>';
    $i = 0;
    foreach($items['user-item-list'] as $item){
        if($i % 4 == 0) $output .= '<tr>';

        $output .= 
            '<td class="item"><a href="http://allegro.pl/show_item.php?item='
            . $item->{'it-id'} . '"><p>' . $item->{'it-name'} . '</p>'
            . '<img src="' . $item->{'it-thumb-url'} . '">';

        if($item->{'it-is-buy-now'}){
            $output .= '<div class="buy">Kup teraz</div>';
            $price = $item->{'it-buy-now-price'};
        } else {
            $output .= '<div class="bid">Licytuj</div>';
            $price = $item->{'it-price'};
        }
                
        $output .= '<span class="price">' . $price . ' zł</span>';
        $output .= '</a></td>';

        if(++$i % 4 == 0) $output .= '</tr>';
    }
    
    $output .= '</table>';
    echo $output;
?>

<p>Kod panelu:</p>
<textarea>
<?php
    echo "<style type=\"text/css\">\n"; 
    echo file_get_contents('panel.css');
    echo '</style>';
    echo $output; 
?>
</textarea>
