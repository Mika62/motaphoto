<?php

class WalkerCopyrightMenu extends Walker_Nav_Menu
{
    public function walk($elements, $max_depth, ...$args): string
    {
        foreach ($elements as $item) {
            $list[] = '<a href="' . $item->url . '" class="footer__link">' . $item->title . '</a>';
        }

        $list[] = '<span class="footer__text">Tous droits réservés</span>';

        return join(' ', $list ?? []);
    }
}
