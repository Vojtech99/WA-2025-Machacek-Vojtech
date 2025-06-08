<?php
$pageTitle = "Domů | Herní archiv";
$pageContent = <<<HTML
<h1 class="text-white mb-4">Vítejte na domovské stránce Herního archivu</h1>
<p class="text-light fs-5 mb-4">
  Herní archiv je místo, kde můžeš snadno spravovat svou herní sbírku, objevovat nové tituly a sdílet své zážitky s ostatními hráči.
  Naše platforma nabízí intuitivní nástroje pro přidávání her, jejich hodnocení a organizaci podle žánrů, platforem a dalších parametrů.
</p>

<p class="text-light fs-5 mb-4">
  Ať už jsi vášnivý sběratel, příležitostný hráč nebo zkušený kritik, Herní archiv ti pomůže mít přehled a udržet si pořádek v herním světě. 
  Prozkoumej rozsáhlou databázi her a využij komunitní funkce, které ti umožní sdílet recenze, tipy a doporučení.
</p>

<p class="text-light fs-5 mb-5">
  Připoj se k nám a začni budovat svůj vlastní herní archiv už dnes! Sleduj nejnovější novinky, recenze a trendy ve světě her.
</p>
<div class="row">
  <div class="col-md-6">
  <img src="/WA-2025-Machacek-Vojtech/Web01-SkB/09-php_projekt-games-users/public/img/gameppp.png" alt="Gamepad" class="img-fluid rounded shadow-lg" />


  </div>
  <div class="col-md-6 d-flex flex-column justify-content-center">
    <h2 class="text-warning mb-3">Nejnovější hry</h2>
    <p class="text-light">Prozkoumejte nejnovější tituly, hodnocení a podrobnosti o populárních hrách.</p>
    <a href="../../controllers/game_list.php" class="btn btn-warning mt-3 align-self-start">Prohlédnout hry</a>
  </div>
</div>
HTML;
include __DIR__ . '/template.php';
