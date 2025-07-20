📝 Auftrag für die nächste Hooliganz-Sitzung
🎯 Ziel: Wir erweitern das Spiel Hooliganz um die ersten interaktiven Elemente und bereiten die Spiellogik vor.

✅ 1. Spielfeld-Logik vorbereiten

Erstelle eine Vue-Komponente Playground.vue, die das Spielfeld darstellt.

Das Spielfeld soll ein Raster (z. B. 10x10 Felder) sein, auf dem später Gebäude und Einheiten platziert werden können.

Jeder Spieler bekommt eine Startposition auf dem Spielfeld (z. B. linke obere Ecke).

✅ 2. Erste Spielfunktionen einbauen

Klicke auf ein Feld → öffnet ein Menü: „Gebäude platzieren“, „Einheit rekrutieren“.

Lege ein Dummy-Gebäude (z. B. „Clubhaus“) an, das beim Platzieren nur ein Icon auf dem Feld zeigt.

✅ 3. Daten speichern

Benutze Pinia oder Vuex, um den aktuellen Spielstand (z. B. positionierte Gebäude) im Frontend zu speichern.

Später soll dieser Spielstand per API ins Laravel-Backend gespeichert werden.

✅ 4. UI verbessern

Baue ein Overlay-Menü mit Buttons: „Bauen“, „Rekrutieren“, „Beenden“.

Gestalte das Menü passend zum urbanen „Hooliganz“-Stil (dunkel, Graffiti-Font).

✅ 5. Vorbereitung fürs Backend

Plane ein API-Endpoint: POST /api/save-game, um den Spielstand vom Frontend ans Backend zu schicken.

💡 Optional (wenn Zeit):

Erstelle eine einfache Animation (z. B. Fade-In) beim Platzieren von Gebäuden.

Denke über Ressourcen nach (z. B. Bier, Respektpunkte), die Spieler sammeln müssen.

Soll ich:
✅ gleich den Vue-Code für das Spielfeld und Menü schreiben?
✅ oder Backend + API vorbereiten?
✅ oder erstmal ein komplettes Konzept für Spielregeln und Gameplay entwerfen (als Grundlage für die Entwicklung)?

👉 Was möchtest du als Nächstes? (Frontend, Backend oder erst Gameplay-Ideen?)


















