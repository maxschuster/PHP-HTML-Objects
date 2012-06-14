<?php

/*
 * Copyright 2012 Max Schuster <sirmaxelot@me.com>
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * This file is used to load all parts of the htmlhaamr
 */

require_once __DIR__ . '/class.Element.php';
require_once __DIR__ . '/class.Attribute.php';
require_once __DIR__ . '/class.SelfClosingElement.php';
require_once __DIR__ . '/class.ContainingElement.php';
require_once __DIR__ . '/class.WebPage.php';
require_once __DIR__ . '/class.DocType.php';

require_once __DIR__ . '/tag/class.Html.php';
require_once __DIR__ . '/tag/class.Head.php';
require_once __DIR__ . '/tag/class.Body.php';
require_once __DIR__ . '/tag/class.Meta.php';
require_once __DIR__ . '/tag/class.Style.php';
require_once __DIR__ . '/tag/class.Script.php';
require_once __DIR__ . '/tag/class.Img.php';
require_once __DIR__ . '/tag/class.Link.php';
require_once __DIR__ . '/tag/class.Div.php';
require_once __DIR__ . '/tag/class.P.php';
require_once __DIR__ . '/tag/class.Span.php';
require_once __DIR__ . '/tag/class.Br.php';
require_once __DIR__ . '/tag/class.A.php';
require_once __DIR__ . '/tag/class.Input.php';
require_once __DIR__ . '/tag/class.Form.php';
require_once __DIR__ . '/tag/class.Fieldset.php';
require_once __DIR__ . '/tag/class.Legend.php';
require_once __DIR__ . '/tag/class.Ul.php';
require_once __DIR__ . '/tag/class.Li.php';
require_once __DIR__ . '/tag/class.Table.php';
require_once __DIR__ . '/tag/class.Tr.php';
require_once __DIR__ . '/tag/class.Td.php';
require_once __DIR__ . '/tag/class.Label.php';
require_once __DIR__ . '/tag/class.Textarea.php';
require_once __DIR__ . '/tag/class.Option.php';
require_once __DIR__ . '/tag/class.Select.php';
require_once __DIR__ . '/tag/class.Title.php';

require_once __DIR__ . '/tag/ext/class.InputText.php';
require_once __DIR__ . '/tag/ext/class.InputRadio.php';
require_once __DIR__ . '/tag/ext/class.InputCheckbox.php';
require_once __DIR__ . '/tag/ext/class.InputSubmit.php';
require_once __DIR__ . '/tag/ext/class.InputButton.php';
require_once __DIR__ . '/tag/ext/class.LinkStylesheet.php';

require_once __DIR__ . '/exception/class.HtmlHaamrExeption.php';
/*
  // Droped developing this
  require_once __DIR__.'/js/jquery/class.jQueryContainer.php';
  require_once __DIR__.'/js/jquery/class.jQueryElement.php';
 */
?>