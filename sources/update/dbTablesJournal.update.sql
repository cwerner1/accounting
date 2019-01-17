-- Datenbank Tabellen Updates für die Benutzer-Zieldatenbank
-- Achtung: Die Updates sind nur für die angegebene Versionserhöhung gültig und sollten nach aufsteigener Versionsnummer ausgeführt werden!
--

-- --------------------------------------------------------

--
-- Update von v2.0.0-beta zu v2.0.2-beta
--
ALTER TABLE `recipient` CHANGE `customerNumber` `customerNumber` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;

-- --------------------------------------------------------

--
-- Update von v0.9.1-alpha zu v2.0.0-beta
--
-- Diese Version ist unter Anderem aufgrund der Umstrukturierung der Tabelle "konto" (neu "account") nicht mehr rückwärzkompatibel.
--
-- Grund:
--     - Alle Tabellen- und Feldbezeichnungnen wurden ins Englische konvertiert
--     - Die "kontoID" (neu "accountID") wird nun automatisch basierend auf der "kontoKlasse" (neu "accountClass") und "kontoKategorie" (neu "accountCategory") erstellt
-- 