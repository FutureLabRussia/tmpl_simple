<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Simple
 *
 * @Copyright   (C) Futurelab LLC by Mike J.K.
 * @license     GNU General Public License версия 2 или новее; см. LICENSE.txt
 * Это сильно упрощённа, версия шаблона Joomla, предназначенная для объяснения 
 приципов построения новых шаблонов.
 **/

defined('_JEXEC') or die;

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
    <jdoc:include type="metas" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    /* Базовый сброс стилей */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* Стили для шапки */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #f4f4f4;
        border-bottom: 1px solid #ddd;
    }


    /* Навигация (десктоп) */
    .mod-menu {
        display: flex;
        list-style: none;
        gap: 1ch; /* Интервал в 1 символ между пунктами */
    }

    .mod-menu a {
        color: #013cfa;
        text-decoration: none;
        font-size: 16px;
    }

</style>
</head>
<body>

 <!-- Заголовок сайта -->
<header class="header">
     <?php if ($this->countModules('header')) : ?>
        <jdoc:include type="modules" name="header" style="raw" />
    <?php endif; ?>
</header>

<!-- Основной контент -->
<main>
<!-- Область компонента -->
<jdoc:include type="component" />


<!-- Подвал (футер) сайта -->
<footer>     
<?php if ($this->countModules('footer')) : ?>
    <jdoc:include type="modules" name="footer" style="raw" />
<?php endif; ?>
</footer>

    <!-- Debug position -->
    <jdoc:include type="modules" name="debug" style="none" />

</body>
</html>
