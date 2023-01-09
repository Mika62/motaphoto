<?php

class WalkerButtonMenu extends Walker_Nav_Menu
{
    public function walk($elements, $max_depth, ...$args): string
    {
        foreach ($elements as $item) {
            $style = str_contains($item->url, '#modal') ? 'header__link header__link--btn' : 'header__link';
            $list[] = '<a href="' . $item->url . '" class="' . $style . '">' . $item->title . '</a>';
        }

        return join(' ', $list ?? []);
    }
}
