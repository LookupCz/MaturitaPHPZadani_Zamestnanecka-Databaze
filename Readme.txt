Velmi zajimave mit funkcni github.

#PetrNemaOtce

Otázka 17 – Zaměstnanecká databáze
Popis
Vytvořte kompletní webovou stránku. Všechny stránky budou mít stejnou strukturu – hlavička, tělo, patička. Je vyžadována grafická úprava webu (máte k dispozici Inkscape). Stránka by měla sloužit řediteli firmy pro správu zaměstnanců a oddělení.
Komponenty aplikace

Přihlášení a registrace
Při registraci zadává uživatel pole Jméno, Příjmení, Heslo, Kontrola hesla, Email, Název firmy. Všechna pole jsou povinná. Nelze provést registraci bez vyplněných polí. Email musí být v databázi unikátní. Validace probíhá na klientu před odesláním na server.
Přihlášení probíhá pomocí emailu a hesla. Po přihlášení bude uživatel přesměrován na hlavní stránku.

Správa oddělení
Přihlášený uživatel (ředitel) může přidávat a upravovat oddělení. Na stránce pro správu oddělení se zobrazí všechna již vytvořená oddělení. U každého oddělení bude zobrazen název, zkratka, město, barva, počet zaměstnanců v oddělení, tlačítka pro smazání, úpravu a detail oddělení. Každé oddělení bude mít jinou barvu (zadána při úpravě/vytváření oddělení). Úprava může ale nemusí probíhat na stejné stránce. Na detailu oddělení je zobrazen výčet jmen všech zaměstnanců.

Správa zaměstnanců
Přihlášený uživatel (ředitel) může přidávat a upravovat zaměstnance. Na stránce pro správu zaměstnanců se zobrazí všichni již vytvoření zaměstnanci. Zaměstnance je možné filtrovat dle oddělení. U každého zaměstnance bude zobrazeno jméno, příjmení, datum nástupu, tlačítka pro smazání, úpravu, detail zaměstnance. Zaměstnanec může pracovat ve více odděleních. Úprava může ale nemusí probíhat na stejné stránce. Na detailu zaměstnance je zobrazen výčet všech oddělení, ve kterých pracuje (ve správných barvách – použijte barvu textu nebo barvu pozadí) a všechny ostatní informace.