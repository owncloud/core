<?php
/**
 * @author Christopher Schäpers <kondou@ts.unde.re>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
print_unescaped(\str_replace('{link}', $_['link'], $l->t('Use the following link to reset your password: {link}')));
print_unescaped("\n\n");
// TRANSLATORS term at the end of a mail
p($l->t("Cheers!"));
?>
<?php print_unescaped($this->inc('plain.mail.footer'));
