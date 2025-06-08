<?php
$pageTitle = "Technologie za herními archivy | Herní archiv";
$pageContent = <<<HTML
<h1 class="text-white mb-4">Jak funguje technicky herní archiv?</h1>

<h2 class="text-warning mt-4">Systém a technologie</h2>
<p class="text-light">
Archiv je většinou web, kde všechno běží na serveru. Data se ukládají do databáze – třeba MySQL nebo PostgreSQL, což jsou prostě místa, kam se všechno ukládá pořádně a přehledně. Server, často psanej v PHP, Pythonu nebo Node.js, zpracovává, co chceš dělat – jestli chceš přidat hru, hledat, upravit něco, nebo smazat.
</p>
<p class="text-light">
Pak je frontend – to je to, co vidíš ty na obrazovce. Většinou to je HTML, CSS, JavaScript, a možná nějaký frameworky jako React nebo Vue, aby to vypadalo hezky a fungovalo plynule.
</p>

<h2 class="text-warning mt-4">Uživatelský přístup a oprávnění</h2>
<p class="text-light">
Archiv musí být bezpečnej, takže jsou tam různé role:
</p>
<ul class="text-light">
  <li>Nepřihlášení uživatelé můžou jen prohlížet obsah,</li>
  <li>přihlášení uživatelé můžou přidávat svoje hry, upravovat je a psát komentáře,</li>
  <li>admini mají úplnou kontrolu a mohou mazat, upravovat cokoli a spravovat celý archiv.</li>
</ul>
<p class="text-light">
Tohle zabraňuje tomu, aby někdo náhodou něco rozbil nebo smazal, co nemá.
</p>

<h2 class="text-warning mt-4">Hlavní funkce archivu</h2>
<ul class="text-light">
  <li>přidávání, úpravy a mazání her (CRUD – Create, Read, Update, Delete),</li>
  <li>vyhledávání a filtrování podle různých kritérií (například podle roku, žánru nebo platformy),</li>
  <li>komentáře a hodnocení od uživatelů,</li>
  <li>nahrávání obrázků, návodů a videí,</li>
  <li>ochrana hesel a dat,</li>
  <li>responsivní design, takže archiv jede i na mobilu.</li>
</ul>

<h2 class="text-warning mt-4">Technologie na stavbu archivu</h2>
<p class="text-light">
Jestli chceš začít, tak klidně můžeš vzít PHP + MySQL, Bootstrap pro vzhled a JavaScript na interaktivitu. Pro větší projekty se hodí frameworky jako Laravel, Django nebo frontendové React a podobně.
</p>
HTML;
include __DIR__ . '/template.php';
?>
