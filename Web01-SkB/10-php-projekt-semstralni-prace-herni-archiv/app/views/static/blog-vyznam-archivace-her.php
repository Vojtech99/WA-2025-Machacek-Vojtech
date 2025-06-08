<?php
$pageTitle = "Význam herního archivu | Herní archiv";
$pageContent = <<<HTML
<h1 class="text-white mb-4">Proč je herní archiv důležitý?</h1>

<p class="text-light">
Je to víc než jen zábava. Hry jsou součástí naší kultury a historie. Archivace pomáhá:
</p>
<ul class="text-light">
  <li>zachovat starý hry, aby nezmizely,</li>
  <li>sledovat, jak se vyvíjel herní průmysl a technologie,</li>
  <li>sdílet zkušenosti a zážitky mezi hráčema.</li>
</ul>

<p class="text-light">
Ale jsou taky problémy:
</p>
<ul class="text-light">
  <li>autorský práva brání volný distribuci,</li>
  <li>starý formáty často dneska nejdou spustit,</li>
  <li>hrozí ztráta dat nebo jejich poškození.</li>
</ul>

<p class="text-light">
Budoucnost vidím v emulátorech, cloudových službách a komunitním přispívání.
</p>

<h2 class="text-warning mt-4">Jak správně spravovat archiv?</h2>
<ul class="text-light">
  <li>pravidelně doplňuj a aktualizuj hry,</li>
  <li>používej jednotný formáty dat (názvy, data vydání atd.),</li>
  <li>pravidelně zálohuj, aby nic nezmizelo,</li>
  <li>používej tagy a kategorie pro lepší hledání,</li>
  <li>chraň data a hesla před zneužitím.</li>
</ul>

<h2 class="text-warning mt-4">Nějaký známý herní archivy</h2>
<ul class="text-light">
  <li>MobyGames – velká databáze her s recenzema a fotkama,</li>
  <li>GOG Galaxy – digitální knihovna,</li>
  <li>Steam – nejznámější platforma s cloudovým uložením,</li>
  <li>Internet Archive – archiv starých her a demo verzí.</li>
</ul>

<h2 class="text-warning mt-4">Bezpečnost a zálohování</h2>
<p class="text-light">
Když děláš archiv, musíš myslet i na bezpečnost. Nikdo nechce, aby mu někdo ukradl účet nebo smazal data. Proto je dobrý používat silný hesla, ideálně ukládat hesla jenom v zašifrované podobě (to dělají všechny moderní systémy). Dále je potřeba chránit se proti útokům, jako je třeba SQL injection nebo XSS, což jsou způsoby, jak někdo může hacknout web. K tomu se používají různé techniky a bezpečnostní pravidla, který by měl programátor znát a používat.
</p>
<p class="text-light">
Zálohování je taky klíčový. Data můžeš pravidelně ukládat na jiné místo, třeba do cloudu nebo na externí disk. Kdyby se něco pokazilo, tak nemusíš přijít o všechno, ale můžeš data rychle obnovit. Tohle je základ, protože i když máš všechno správně napsaný a ošetřený, technika se může pokazit.
</p>

<h2 class="text-warning mt-4">Komunita a budoucnost archivů</h2>
<p class="text-light">
Archiv není jenom o tom mít informace, ale taky o tom, aby se lidi zapojili a pomáhali si navzájem. Když to archiv umožní, aby přispívali hráči sami, třeba přidávali recenze, fotky, tipy nebo opravovali chyby, vzniká kolem toho komunita. Ta komunita dělá archiv živým a neustále se zlepšujícím.
</p>
<p class="text-light">
Do budoucna můžeme čekat, že archivy budou používat víc umělou inteligenci, která pomůže třeba automaticky třídit hry, doporučovat nové, nebo opravovat informace. Taky bude víc cloudových služeb a archivů, které půjdou používat odkudkoliv.
</p>

<h2 class="text-warning mt-4">Závěr</h2>
<p class="text-light">
Herní archiv ti fakt pomůže mít přehled o hrách a zároveň zachovat jejich historii. Když ho budeš dobře spravovat, pomůžeš sobě i ostatním, aby se na hry nezapomnělo.
</p>
HTML;
include __DIR__ . '/template.php';
?>
