CREATE TABLE prihlasky (
  id_prihlaska INT PRIMARY KEY AUTO_INCREMENT, /* Vygeneruje se samo */
  team VARCHAR(255) NOT NULL, /* Pozor na limit znaků */
  ridic_jmeno VARCHAR(255) NOT NULL,
  ridic_op VARCHAR(255) NOT NULL, /* Zkratka? */
  ridic_rc VARCHAR(255) NOT NULL, /* další zkratka? */
  ridic_rp VARCHAR(255) NOT NULL, /* more strč si ty akronyma do prdele */
  ridic_adresa VARCHAR(255) NOT NULL, /* Pozor na limit znaků */
  ridic_kontakt VARCHAR(255) NOT NULL, /* Mail? telefon? fax? wtf? */
  ridic_pojistovna VARCHAR(255) NOT NULL,
  spoluj_jmeno VARCHAR(255) NOT NULL,
  spoluj_op VARCHAR(255) NOT NULL, /* Zase zkratky */
  spoluj_rc VARCHAR(255) NOT NULL, /* Zase zkratky */
  spoluj_rp VARCHAR(255) NOT NULL, /* Zase zkratky */
  spoluj_adresa VARCHAR(255) NOT NULL,
  spoluj_kontakt VARCHAR(255) NOT NULL,
  spoluj_pojistovna VARCHAR(255) NOT NULL,
  auto_trida VARCHAR(255) NOT NULL, /* ??? */
  auto_spz VARCHAR(32) NOT NULL,
  auto_znacka VARCHAR(255) NOT NULL,
  auto_typ VARCHAR(255) NOT NULL, /* ??? */
  auto_obsah VARCHAR(255) NOT NULL, /* to je kurva co? */
  auto_pojistovna VARCHAR(255) NOT NULL, /* Jméno? Číslo smlouvy? Co jako? */
  info VARCHAR(4096) NOT NULL, /* ??? */
  souhlas BOOLEAN NOT NULL, /* Hlavně to správně seserilizujte, ne že mi sem narvete ON/OFF */
  datum_zavodu DATE NOT NULL, /* Bacha na formát! */
  datum_prihlaseni DATETIME NOT NULL /* Bacha na formát! */
)