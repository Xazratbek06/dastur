<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php
error_reporting(0); // Barcha "Warning" yozuvlarini yashiradi
?>
<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    $lang = $_GET['lang'];
} else {
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'uz';
}
?>
<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (isset($_GET['lang'])) { $_SESSION['lang'] = $_GET['lang']; }
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'uz';

$translations = [
    'uz' => ['name'=>"O'zbekcha",'title'=>'KALKULYATOR','std'=>'Oddiy','eng'=>'Ilmiy','res'=>'Natija','hist'=>'Tarix','empty_hist'=>'Tarix bo\'sh','curr'=>'Valyuta','biz'=>'Biznes','time'=>'Vaqt','mass'=>'Massa','dist'=>'Masofa','temp'=>'Harorat','settings'=>'Sozlamalar','fuel'=>'Yoqilg\'i','geo'=>'Geometriya','phys'=>'Fizika','health'=>'Sog\'liq','loan'=>'KREDIT','vol'=>'Hajm','flag'=>'🇺🇿','op_plus'=>"Qo'shish (+)",'op_minus'=>"Ayirish (-)",'op_mult'=>"Ko'paytirish (×)",'op_div'=>"Bo'lish (÷)",'op_pow'=>"Darajaga ko'tarish (x^y)",'op_perc'=>"Foiz (%)",'op_sq'=>"Kvadrat (x²)",'op_cub'=>"Kub (x³)",'op_sqrt'=>"Kvadrat ildiz (√)",'op_sin'=>"Sinus (sin)",'op_cos'=>"Cosinus (cos)",'op_tan'=>"Tangens (tan)",'op_fact'=>"Faktorial (n!)",'bmi_thin'=>"Ozg'in",'bmi_normal'=>"Normal",'bmi_over'=>"Ortiqcha vazn",'bmi_obese'=>"Semizlik",'clear_hist'=>"Tarixni tozalash",'loan_title'=>"KREDIT KALKULYATORI",'loan_type_select'=>"Kredit turini tanlang",'loan_personal'=>"Iste'mol krediti / Mikroqarz",'loan_avto'=>"Avtokredit",'loan_ipoteka'=>"Ipoteka krediti",'loan_sum'=>"Kredit miqdori (so'm)",'first_pay'=>"Boshlang'ich to'lov",'loan_rate'=>"Yillik foiz stavkasi (%)",'loan_term'=>"Muddati (oyda)",'loan_type'=>"To'lov usuli",'annuity'=>"Annuitet (Bir xil to'lov)",'diff'=>"Differensial (Kamayib boruvchi)",'monthly_out'=>"Oylik to'lov",'total_out'=>"Jami to'lov",'f_dist'=>'Masofa (km)','f_cons'=>'Sarf (L/100km)','f_res'=>'Yoqilg\'i miqdori','p_dist'=>'Masofa (S)','p_time'=>'Vaqt (T)','p_speed'=>'Tezlik (V=S/T)','clear'=>'Tozalash','modules'=>'MODULLAR','time_conv'=>'VAQT','bmi_title'=>'BMI SOG\'LIQ','bmi_w'=>'Vazn (kg)','bmi_h'=>'Bo\'y (cm)','m_in'=>'Miqdorni kiriting','c_from'=>'Qaysi valyutadan','c_to'=>'Qaysi valyutaga','geo_r'=>'Aylana radiusi','geo_s'=>'Yuzi','m_kg'=>'Kg','m_gr'=>'Gramm','m_sn'=>'Sentner','m_tn'=>'Tonna','m_lb'=>'Funt','d_km'=>'Km','d_cm'=>'Santimetr','d_m'=>'Metr','d_mi'=>'Milya','d_ft'=>'Fut','t_s'=>'Sekund','t_m'=>'Minut','t_h'=>'Soat','t_d'=>'Kun','t_w'=>'Hafta','t_mo'=>'Oy','t_y'=>'Yil','aliment_title'=>"Aliment hisoblash",'salary_label'=>"Oylik ish haqi (sum)",'child_1'=>"1 ta bola (25%)",'child_2'=>"2 ta bola (33%)",'child_3'=>"3 ta va undan ko'p (50%)",'calc_btn'=>"Hisoblash",'result_label'=>"Aliment miqdori",'legal_note'=>"*Bu hisob-kitob taqribiy hisoblanadi.",'phys_el_title'=>"Elektr sarfi",'watt_ph'=>"Quvvat (Vatt)",'hour_ph'=>"Kunlik soat",'price_ph'=>"1 kVt narxi",'month_res'=>"Oylik xarajat",'dens_title'=>"Zichlik (ρ = m / V)",'mass_ph'=>"Mass (m)",'vol_ph'=>"Hajm (V)",'force_title'=>"Kuch (F = m * a)",'acc_ph'=>"Tezlanish (a)",'res_perim'=>"Perimetr",'geom_title'=>"Geometriya",'rect_title'=>"To'rtburchak yuzi",'circle_title'=>"Aylana yuzi",'side_a'=>"A tomon (m)",'side_b'=>"B tomon (m)",'radius'=>"Radius (r)",'res_area'=>"Yuza"],
    'en' => ['name'=>"English",'title'=>'Calculator','std'=>'Standard','eng'=>'Scientific','res'=>'Result','hist'=>'History','empty_hist'=>'History is empty','curr'=>'Currency','biz'=>'Business','time'=>'Time','mass'=>'Mass','dist'=>'Distance','temp'=>'Temperature','settings'=>'Settings','fuel'=>'Fuel','geo'=>'Geometry','phys'=>'Physics','health'=>'Health','loan'=>'Loan','vol'=>'Volume','flag'=>'🇺🇸','op_plus'=>"Addition (+)",'op_minus'=>"Subtraction (-)",'op_mult'=>"Multiplication (×)",'op_div'=>"Division (÷)",'op_pow'=>"Power (x^y)",'op_perc'=>"Percentage (%)",'op_sq'=>"Square (x²)",'op_cub'=>"Cube (x³)",'op_sqrt'=>"Square Root (√)",'op_sin'=>"Sine (sin)",'op_cos'=>"Cosine (cos)",'op_tan'=>"Tangent (tan)",'op_fact'=>"Factorial (n!)",'bmi_thin'=>"Underweight",'bmi_normal'=>"Normal",'bmi_over'=>"Overweight",'bmi_obese'=>"Obesity",'clear_hist'=>"Clear History",'loan_sum'=>'Loan Amount','loan_rate'=>'Annual Rate (%)','loan_term'=>'Term (months)','loan_m'=>'Monthly Payment','loan_t'=>'Total Amount','f_dist'=>'Distance (km)','f_cons'=>'Consumption (L/100km)','f_res'=>'Fuel Amount','p_dist'=>'Distance (S)','p_time'=>'Time (T)','p_speed'=>'Speed (V=S/T)','clear'=>'Clear','modules'=>'Modules','time_conv'=>'Time','bmi_title'=>'Health Index','bmi_w'=>'Weight (kg)','bmi_h'=>'Height (cm)','m_in'=>'Enter amount','c_from'=>'From currency','c_to'=>'To currency','geo_r'=>'Radius','geo_s'=>'Area','m_kg'=>'kg','m_gr'=>'gram','m_sn'=>'quintal','m_tn'=>'ton','m_lb'=>'pound','d_km'=>'km','d_cm'=>'centimeter','d_m'=>'meter','d_mi'=>'mile','d_ft'=>'foot','t_s'=>'second','t_m'=>'minute','t_h'=>'hour','t_d'=>'day','t_w'=>'week','t_mo'=>'month','t_y'=>'year','dens_title'=>"Density (ρ = m / V)",'force_title'=>"Force (F = m * a)",'mass_ph'=>"Mass (m)",'vol_ph'=>"Volume (V)",'acc_ph'=>"Acceleration (a)",'geom_title'=>"Geometry",'rect_title'=>"Rectangle Area",'circle_title'=>"Circle Area",'side_a'=>"Side A (m)",'side_b'=>"Side B (m)",'radius'=>"Radius (r)",'res_area'=>"Area",'res_perim'=>"Perimeter"],
    'ru' => ['name'=>"Русский",'title'=>'КАЛЬКУЛЯТОР','std'=>'Обычный','eng'=>'Научный','res'=>'Результат','hist'=>'История','empty_hist'=>'История пуста','curr'=>'Валюта','biz'=>'Бизнес','time'=>'Время','mass'=>'Масса','dist'=>'Расстояние','temp'=>'Температура','settings'=>'Настройки','fuel'=>'Топливо','geo'=>'Геометрия','phys'=>'Физика','health'=>'Здоровье','loan'=>'Кредит','vol'=>'Объем','flag'=>'🇷🇺','op_plus'=>"Сложение (+)",'op_minus'=>"Вычитание (-)",'op_mult'=>"Умножение (×)",'op_div'=>"Деление (÷)",'op_pow'=>"Возведение в степень (x^y)",'op_perc'=>"Процент (%)",'op_sq'=>"Квадрат (x²)",'op_cub'=>"Куб (x³)",'op_sqrt'=>"Квадратный корень (√)",'op_sin'=>"Синус (sin)",'op_cos'=>"Косинус (cos)",'op_tan'=>"Тангенс (tan)",'op_fact'=>"Факториал (n!)",'bmi_thin'=>"Худой",'bmi_normal'=>"Норма",'bmi_over'=>"Лишний вес",'bmi_obese'=>"Ожирение",'clear_hist'=>"Очистить историю",'loan_sum'=>'Сумма кредита','loan_rate'=>'Ставка (%)','loan_term'=>'Срок (мес)','loan_m'=>'Ежемесячный платеж','loan_t'=>'Общая сумма','f_dist'=>'Расстояние (км)','f_cons'=>'Расход (л/100km)','f_res'=>'Объем топлива','p_dist'=>'Расстояние (S)','p_time'=>'Время (T)','p_speed'=>'Скорость (V=S/T)','clear'=>'Очистить','modules'=>'МОДУЛИ','time_conv'=>'ВРЕМЯ','bmi_title'=>'ИМТ ЗДОРОВЬЕ','bmi_w'=>'Вес (кг)','bmi_h'=>'Рост (см)','m_in'=>'Введите сумму','c_from'=>'Из валюты','c_to'=>'В валюту','geo_r'=>'Радиус','geo_s'=>'Площадь','m_kg'=>'Кг','m_gr'=>'Грамм','m_sn'=>'Центнер','m_tn'=>'Тонна','m_lb'=>'Фунт','d_km'=>'Км','d_cm'=>'Сантиметр','d_m'=>'Метр','d_mi'=>'Миля','d_ft'=>'Футов','t_s'=>'Секунда','t_m'=>'Минута','t_h'=>'Час','t_d'=>'День','t_w'=>'Неделя','t_mo'=>'Месяц','t_y'=>'Год','dens_title'=>"Плотность (ρ = m / V)",'force_title'=>"Сила (F = m * a)",'mass_ph'=>"Масса (m)",'vol_ph'=>"Объем (V)",'acc_ph'=>"Ускорение (a)",'geom_title'=>"Геометрия",'rect_title'=>"Площадь прямоугольника",'circle_title'=>"Площадь круга",'side_a'=>"Сторона A (м)",'side_b'=>"Сторона B (м)",'radius'=>"Радиус (r)",'res_area'=>"Площадь",'res_perim'=>"Периметр"],
    'tr' => ['name'=>"Türkçe",'title'=>'HESAP MAKINESI','std'=>'Standart','eng'=>'Bilimsel','res'=>'Sonuç','hist'=>'Geçmiş','empty_hist'=>'Geçmiş boş','curr'=>'Döviz','biz'=>'İş','time'=>'Zaman','mass'=>'Kütle','dist'=>'Mesafe','temp'=>'Sıcaklık','settings'=>'Ayarlar', 'fuel'=>'Yakıt','geo'=>'Geometri','phys'=>'Fizik','health'=>'Sağlık','loan'=>'Kredi','vol'=>'Hacim','flag'=>'🇹🇷','op_plus'=>"Toplama (+)",'op_minus'=>"Çıkarma (-)",'op_mult'=>"Çarpma (×)",'op_div'=>"Bölme (÷)",'op_pow'=>"Üs alma (x^y)",'op_perc'=>"Yüzde (%)",'op_sq'=>"Kare (x²)",'op_cub'=>"Küp (x³)",'op_sqrt'=>"Karekök (√)",'op_sin'=>"Sinüs (sin)",'op_cos'=>"Kosinüs (cos)",'op_tan'=>"Tanjant (tan)",'op_fact'=>"Faktöriyel (n!)",'bmi_thin'=>"Zayıf",'bmi_normal'=>"Normal",'bmi_over'=>"Fazla kilolu",'bmi_obese'=>"Obez",'clear_hist'=>"Geçmişi temizle",'loan_sum'=>'Kredi Tutarı','loan_rate'=>'Yıllık Faiz (%)','loan_term'=>'Vade (ay)','loan_m'=>'Aylık','loan_t'=>'Toplam','f_dist'=>'Mesafe (km)','f_cons'=>'Tüketim (L/100km)','f_res'=>'Yakıt miktarı','p_dist'=>'Mesafe (S)','p_time'=>'Zaman (T)','p_speed'=>'Hız (V=S/T)','clear'=>'Temizle','modules'=>'MODÜLLER','time_conv'=>'ZAMAN','bmi_title'=>'VKI SAĞLIK','bmi_w'=>'Kilo (kg)','bmi_h'=>'Boy (cm)','m_in'=>'Miktarı girin','c_from'=>'Hangi para biriminden','c_to'=>'Hangi para birimine','geo_r'=>'Yarıçap','geo_s'=>'Alan','m_kg'=>'Kg','m_gr'=>'Gram','m_sn'=>'Kental','m_tn'=>'Ton','m_lb'=>'Libre', 'd_km'=>'Km','d_cm'=>'Santimetre','d_m'=>'Metre','d_mi'=>'Mil','d_ft'=>'Ayak','t_s'=>'Saniye','t_m'=>'Dakika','t_h'=>'Saat','t_d'=>'Gün','t_w'=>'Hafta','t_mo'=>'Ay','t_y'=>'Yıl','dens_title'=>"Yoğunluk (ρ = m / V)",'force_title'=>"Kuvvet (F = m * a)",'mass_ph'=>"Kütle (m)",'vol_ph'=>"Hacim (V)",'acc_ph'=>"İvme (a)",'geom_title'=>"Geometri",'rect_title'=>"Dikdörtgen Alanı",'circle_title'=>"Daire Alanı",'side_a'=>"Kenar A (m)",'side_b'=>"Kenar B (m)",'radius'=>"Yarıçap (r)",'res_area'=>"Alan",'res_perim'=>"Çevre"],
    'de' => ['name'=>"Deutsch",'title'=>'RECHNER','std'=>'Standard','eng'=>'Wissenschaft','res'=>'Ergebnis','hist'=>'Verlauf','empty_hist'=>'Verlauf leer','curr'=>'Währung','biz'=>'Geschäft','time'=>'Zeit','mass'=>'Masse','dist'=>'Distanz','temp'=>'Temperatur','settings'=>'Setup','fuel'=>'Treibstoff','geo'=>'Geometrie','phys'=>'Physik','health'=>'Gesundheit','loan'=>'Kredit','vol'=>'Volumen','flag'=>'🇩🇪','op_plus'=>"Addition (+)",'op_minus'=>"Subtraktion (-)",'op_mult'=>"Multiplikation (×)",'op_div'=>"Division (÷)",'op_pow'=>"Potenzieren (x^y)",'op_perc'=>"Prozent (%)",'op_sq'=>"Quadrat (x²)",'op_cub'=>"Kubik (x³)",'op_sqrt'=>"Quadratwurzel (√)",'op_sin'=>"Sinus (sin)",'op_cos'=>"Kosinus (cos)",'op_tan'=>"Tangens (tan)",'op_fact'=>"Fakultät (n!)",'bmi_thin'=>"Untergewicht",'bmi_normal'=>"Normal",'bmi_over'=>"Übergewicht",'bmi_obese'=>"Adipositas",'clear_hist'=>"Verlauf löschen",'loan_sum'=>'Kreditbetrag','loan_rate'=>'Zinssatz (%)','loan_term'=>'Laufzeit (Monate)','loan_m'=>'Monatliche Rate','loan_t'=>'Gesamtbetrag','f_dist'=>'Distanz (km)','f_cons'=>'Verbrauch (L/100km)','f_res'=>'Kraftstoffmenge','p_dist'=>'Distanz (S)','p_time'=>'Zeit (T)','p_speed'=>'Geschwindigkeit (V=S/T)','clear'=>'Löschen','modules'=>'MODULE','time_conv'=>'ZEIT','bmi_title'=>'BMI GESUNDHEIT','bmi_w'=>'Gewicht (kg)','bmi_h'=>'Größe (cm)','m_in'=>'Menge eingeben','c_from'=>'Von Währung','c_to'=>'In Währung','geo_r'=>'Kreisradius','geo_s'=>'Fläche','m_kg'=>'Kg','m_gr'=>'Gramm','m_sn'=>'Zentner','m_tn'=>'Tonne','m_lb'=>'Pfund','d_km'=>'Km','d_cm'=>'Zentimeter','d_m'=>'Meter','d_mi'=>'Meile','d_ft'=>'Fuß','t_s'=>'Sekunde','t_m'=>'Minute','t_h'=>'Stunde','t_d'=>'Tag','t_w'=>'Woche','t_mo'=>'Monat','t_y'=>'Jahr','dens_title'=>"Dichte (ρ = m / V)",'force_title'=>"Kraft (F = m * a)",'mass_ph'=>"Masse (m)",'vol_ph'=>"Volumen (V)",'acc_ph'=>"Beschleunigung (a)",'geom_title'=>"Geometrie",'rect_title'=>"Rechteckfläche",'circle_title'=>"Kreisfläche",'side_a'=>"Seite A (m)",'side_b'=>"Seite B (m)",'radius'=>"Radius (r)",'res_area'=>"Fläche",'res_perim'=>"Umfang"],
    'fr' => ['name'=>"Français",'title'=>'CALCULATRICE','std'=>'Standard','eng'=>'Scientifique','res'=>'Résultat','hist'=>'Histoire','empty_hist'=>'Historique vide','curr'=>'Devise','biz'=>'Affaires','time'=>'Temps','mass'=>'Masse','dist'=>'Distance','temp'=>'Température','settings'=>'Réglages','fuel'=>'Carburant','geo'=>'Géométrie','phys'=>'Physique','health'=>'Santé','loan'=>'Prêt','vol'=>'Volume','flag'=>'🇫🇷','op_plus'=>"Addition (+)",'op_minus'=>"Sustraction (-)",'op_mult'=>"Multiplication (×)",'op_div'=>"Division (÷)",'op_pow'=>"Puissance (x^y)",'op_perc'=>"Pourcentage (%)",'op_sq'=>"Carré (x²)",'op_cub'=>"Cube (x³)",'op_sqrt'=>"Racine carrée (√)",'op_sin'=>"Sinus (sin)",'op_cos'=>"Cossinus (cos)",'op_tan'=>"Tangente (tan)",'op_fact'=>"Factorielle (n!)",'bmi_thin'=>"Maigre",'bmi_normal'=>"Normal",'bmi_over'=>"Surpoids",'bmi_obese'=>"Obésité",'clear_hist'=>"Effacer l'historique",'loan_sum'=>'Montant du prêt','loan_rate'=>'Taux annuel (%)','loan_term'=>'Durée (mois)','loan_m'=>'Mensuel','loan_t'=>'Total','f_dist'=>'Distance (km)','f_cons'=>'Consommation (L/100km)','f_res'=>'Quantité de carburant','p_dist'=>'Distance (S)','p_time'=>'Temps (T)','p_speed'=>'Vitesse (V=S/T)','clear'=>'Effacer','modules'=>'MODULES','time_conv'=>'TEMPS','bmi_title'=>'IMC SANTÉ','bmi_w'=>'Poids (kg)','bmi_h'=>'Taille (cm)','m_in'=>'Entrez le montant','c_from'=>'De la devise','c_to'=>'Vers la devise','geo_r'=>'Rayon','geo_s'=>'Surface','m_kg'=>'Kg','m_gr'=>'Gramme','m_sn'=>'Quintal','m_tn'=>'Tonne','m_lb'=>'Livre','d_km'=>'Km','d_cm'=>'Centimètre','d_m'=>'Mètre','d_mi'=>'Mile','d_ft'=>'Pied','t_s'=>'Seconde','t_m'=>'Minute','t_h'=>'Heure','t_d'=>'Jour','t_w'=>'Semaine','t_mo'=>'Mois','t_y'=>'Année','dens_title'=>"Masse volumique (ρ = m / V)",'force_title'=>"Force (F = m * a)",'mass_ph'=>"Masse (m)",'vol_ph'=>"Volume (V)",'acc_ph'=>"Accélération (a)",'geom_title'=>"Géométrie",'rect_title'=>"Surface du rectangle",'circle_title'=>"Surface du cercle",'side_a'=>"Côté A (m)",'side_b'=>"Côté B (m)",'radius'=>"Rayon (r)",'res_area'=>"Surface",'res_perim'=>"Périmètre"],
    'es' => ['name'=>"Español",'title'=>'CALCULADORA','std'=>'Estándar','eng'=>'Científico','res'=>'Resultado','hist'=>'Historial','empty_hist'=>'Historial vacío','curr'=>'Moneda','biz'=>'Negocios','time'=>'Tiempo','mass'=>'Masa','dist'=>'Distance','temp'=>'Temperatura','settings'=>'Ajustes','fuel'=>'Combustible','geo'=>'Geometría','phys'=>'Física', 'health'=>'Salud','loan'=>'Préstamo','vol'=>'Volumen','flag'=>'🇪🇸','op_plus'=>"Adición (+)",'op_minus'=>"Sustracción (-)",'op_mult'=>"Multiplicación (×)",'op_div'=>"División (÷)",'op_pow'=>"Potencia (x^y)",'op_perc'=>"Porcentaje (%)",'op_sq'=>"Cuadrado (x²)",'op_cub'=>"Cubo (x³)",'op_sqrt'=>"Raíz cuadrada (√)",'op_sin'=>"Seno (sin)",'op_cos'=>"Coseno (cos)",'op_tan'=>"Tangente (tan)",'op_fact'=>"Factorial (n!)",'bmi_thin'=>"Delgado",'bmi_normal'=>"Normal",'bmi_over'=>"Sobrepeso",'bmi_obese'=>"Obesidad",'clear_hist'=>"Limpiar historial",'loan_sum'=>'Monto','loan_rate'=>'Tasa (%)','loan_term'=>'Plazo (meses)','loan_m'=>'Mensual','loan_t'=>'Total','f_dist'=>'Distancia (km)','f_cons'=>'Consumo (L/100km)','f_res'=>'Cantidad combustible','p_dist'=>'Distancia (S)','p_time'=>'Tiempo (T)','p_speed'=>'Velocidad (V=S/T)','clear'=>'Borrar','modules'=>'MÓDULOS','time_conv'=>'TIEMPO','bmi_title'=>'IMC SALUD','bmi_w'=>'Peso (kg)','bmi_h'=>'Altura (cm)','m_in'=>'Ingrese monto','c_from'=>'De moneda','c_to'=>'A moneda','geo_r'=>'Radio','geo_s'=>'Área','m_kg'=>'Kg','m_gr'=>'Gramo','m_sn'=>'Quintal','m_tn'=>'Tonelada','m_lb'=>'Libra','d_km'=>'Km','d_cm'=>'Centímetro','d_m'=>'Metro','d_mi'=>'Milla','d_ft'=>'Pie','t_s'=>'Segundo', 't_m'=>'Minuto','t_h'=>'Hora','t_d'=>'Día','t_w'=>'Semana','t_mo'=>'Mes','t_y'=>'Año','dens_title'=>"Densidad (ρ = m / V)",'force_title'=>"Fuerza (F = m * a)",'mass_ph'=>"Masa (m)",'vol_ph'=>"Volumen (V)",'acc_ph'=>"Aceleración (a)",'geom_title'=>"Geometría",'rect_title'=>"Área del rectángulo",'circle_title'=>"Área del círculo",'side_a'=>"Lado A (m)",'side_b'=>"Lado B (m)",'radius'=>"Radio (r)",'res_area'=>"Área",'res_perim'=>"Perímetro"],
    'it' => ['name'=>"Italiano",'title'=>'CALCOLATRICE','std'=>'Standard','eng'=>'Scientifico','res'=>'Risultato','hist'=>'Storia','empty_hist'=>'Cronologia vuota','curr'=>'Valuta','biz'=>'Affari','time'=>'Tempo','mass'=>'Massa','dist'=>'Distanza','temp'=>'Temperatura','settings'=>'Impostazioni','fuel'=>'Carburant','geo'=>'Geometria','phys'=>'Fisica','health'=>'Salute','loan'=>'Prestito','vol'=>'Volume','flag'=>'🇮🇹','op_plus'=>"Addizione (+)",'op_minus'=>"Sustrazione (-)",'op_mult'=>"Moltiplicazione (×)",'op_div'=>"Divisione (÷)",'op_pow'=>"Potenza (x^y)",'op_perc'=>"Percentuale (%)",'op_sq'=>"Quadrato (x²)",'op_cub'=>"Cubo (x³)",'op_sqrt'=>"Radice quadrata (√)",'op_sin'=>"Seno (sin)",'op_cos'=>"Cosseno (cos)",'op_tan'=>"Tangente (tan)",'op_fact'=>"Fattoriale (n!)",'bmi_thin'=>"Sottopeso",'bmi_normal'=>"Normale",'bmi_over'=>"Sovrappeso",'bmi_obese'=>"Obesità",'clear_hist'=>"Cancella cronologia",'loan_sum'=>'Importo','loan_rate'=>'Tasso (%)','loan_term'=>'Durata (mesi)','loan_m'=>'Mensile','loan_t'=>'Totale','f_dist'=>'Distanza (km)','f_cons'=>'Consumo (L/100km)','f_res'=>'Quantità carburante','p_dist'=>'Distanza (S)','p_time'=>'Tempo (T)','p_speed'=>'Velocità (V=S/T)','clear'=>'Cancella','modules'=>'MODULI','time_conv'=>'TEMPO','bmi_title'=>'IMC SALUTE','bmi_w'=>'Peso (kg)','bmi_h'=>'Altezza (cm)','m_in'=>'Inserisci importo','c_from'=>'Dalla valuta','c_to'=>'Alla valuta','geo_r'=>'Raggio','geo_s'=>'Area','m_kg'=>'Kg','m_gr'=>'Grammo','m_sn'=>'Quintale','m_tn'=>'Tonnellata','m_lb'=>'Libbra','d_km'=>'Km','d_cm'=>'Centimetro','d_m'=>'Metro','d_mi'=>'Miglio','d_ft'=>'Piede','t_s'=>'Secondo','t_m'=>'Minuto','t_h'=>'Ora','t_d'=>'Giorno','t_w'=>'Settimana','t_mo'=>'Mese','t_y'=>'Anno','dens_title'=>"Densità (ρ = m / V)",'force_title'=>"Forza (F = m * a)",'mass_ph'=>"Massa (m)",'vol_ph'=>"Volume (V)",'acc_ph'=>"Accelerazione (a)",'geom_title'=>"Geometria",'rect_title'=>"Area Rettangolo",'circle_title'=>"Area Cerchio",'side_a'=>"Lato A (m)",'side_b'=>"Lato B (m)",'radius'=>"Raggio (r)",'res_area'=>"Area",'res_perim'=>"Perimetro"],
    'pt' => ['name'=>"Português",'title'=>'CALCULADORA','std'=>'Padrão','eng'=>'Científico','res'=>'Resultado','hist'=>'Histórico','empty_hist'=>'Histórico vazio','curr'=>'Moeda','biz'=>'Negócios','time'=>'Tempo','mass'=>'Massa','dist'=>'Distância','temp'=>'Temperatura','settings'=>'Configurações','fuel'=>'Combustível','geo'=>'Geometria','phys'=>'Física','health'=>'Saúde','loan'=>'Empréstimo','vol'=>'Volume','flag'=>'🇵🇹','op_plus'=>"Adição (+)",'op_minus'=>"Subtração (-)",'op_mult'=>"Multiplicação (×)",'op_div'=>"Division (÷)",'op_pow'=>"Potência (x^y)",'op_perc'=>"Porcentagem (%)",'op_sq'=>"Quadrado (x²)",'op_cub'=>"Cubo (x³)",'op_sqrt'=>"Raiz quadrada (√)",'op_sin'=>"Seno (sin)",'op_cos'=>"Cosseno (cos)",'op_tan'=>"Tangente (tan)",'op_fact'=>"Fatorial (n!)",'bmi_thin'=>"Abaixo do peso",'bmi_normal'=>"Normal",'bmi_over'=>"Sobrepeso",'bmi_obese'=>"Obesidade",'clear_hist'=>"Limpar histórico",'loan_sum'=>'Valor empréstimo','loan_rate'=>'Taxa anual (%)','loan_term'=>'Prazo (meses)','loan_m'=>'Mensal','loan_t'=>'Total','f_dist'=>'Distância (km)','f_cons'=>'Consumo (L/100km)','f_res'=>'Qtd combustível','p_dist'=>'Distância (S)','p_time'=>'Tempo (T)','p_speed'=>'Velocidade (V=S/T)','clear'=>'Limpar','modules'=>'MÓDULOS','time_conv'=>'TEMPO','bmi_title'=>'IMC SAÚDE','bmi_w'=>'Peso (kg)','bmi_h'=>'Altura (cm)','m_in'=>'Insira o valor','c_from'=>'De moeda','c_to'=>'Para moeda','geo_r'=>'Raio','geo_s'=>'Área','m_kg'=>'Kg','m_gr'=>'Grama','m_sn'=>'Arroba','m_tn'=>'Tonelada','m_lb'=>'Libra','d_km'=>'Km','d_cm'=>'Centímetro','d_m'=>'Metro','d_mi'=>'Milha','d_ft'=>'Pé', 't_s'=>'Segundo','t_m'=>'Minuto','t_h'=>'Hora','t_d'=>'Dia','t_w'=>'Semana','t_mo'=>'Mês','t_y'=>'Ano','dens_title'=>"Densidade (ρ = m / V)",'force_title'=>"Força (F = m * a)",'mass_ph'=>"Massa (m)",'vol_ph'=>"Volume (V)",'acc_ph'=>"Aceleração (a)",'geom_title'=>"Geometria",'rect_title'=>"Área do retângulo",'circle_title'=>"Área do círculo",'side_a'=>"Lado A (m)",'side_b'=>"Lado B (m)",'radius'=>"Raio (r)",'res_area'=>"Área",'res_perim'=>"Perímetro"],
    'jp' => ['name'=>"日本語",'title'=>'計算機','std'=>'標準','eng'=>'科学的','res'=>'結果','hist'=>'履歴','empty_hist'=>'履歴なし','curr'=>'通貨','biz'=>'ビジネス','time'=>'時間','mass'=>'質量','dist'=>'距離','temp'=>'温度','settings'=>'設定','fuel'=>'燃料','geo'=>'幾何学','phys'=>'物理','health'=>'健康','loan'=>'ローン','vol'=>'音量','flag'=>'🇯🇵','op_plus'=>"足し算 (+)",'op_minus'=>"引き算 (-)",'op_mult'=>"掛け算 (×)",'op_div'=>"割り算 (÷)",'op_pow'=>"べき乗 (x^y)",'op_perc'=>"パーセント (%)",'op_sq'=>"二乗 (x²)",'op_cub'=>"三乗 (x³)",'op_sqrt'=>"平方根 (√)",'op_sin'=>"正弦 (sin)",'op_cos'=>"余弦 (cos)",'op_tan'=>"正接 (tan)",'op_fact'=>"階乗 (n!)",'bmi_thin'=>"痩せすぎ",'bmi_normal'=>"標準",'bmi_over'=>"過体重",'bmi_obese'=>"肥満",'clear_hist'=>"履歴を削除",'loan_sum'=>'融資額','loan_rate'=>'年利 (%)','loan_term'=>'期間 (ヶ月)','loan_m'=>'月額','loan_t'=>'合計','f_dist'=>'距離 (km)','f_cons'=>'燃費 (L/100km)','f_res'=>'燃料量','p_dist'=>'距離 (S)','p_time'=>'時間 (T)','p_speed'=>'速度 (V=S/T)','clear'=>'クリア','modules'=>'モジュール','time_conv'=>'時間','bmi_title'=>'BMI 健康','bmi_w'=>'体重 (kg)','bmi_h'=>'身長 (cm)','m_in'=>'金額入力','c_from'=>'元の通貨','c_to'=>'換算通貨','geo_r'=>'半径','geo_s'=>'面積','m_kg'=>'Kg','m_gr'=>'グラム','m_sn'=>'セントナー','m_tn'=>'トン','m_lb'=>'ポンド','d_km'=>'Km','d_cm'=>'センチ','d_m'=>'メートル','d_mi'=>'マイル','d_ft'=>'フィート','t_s'=>'秒','t_m'=>'分','t_h'=>'時間','t_d'=>'日','t_w'=>'週','t_mo'=>'月','t_y'=>'年','dens_title'=>"密度 (ρ = m / V)",'force_title'=>"力 (F = m * a)",'mass_ph'=>"質量 (m)",'vol_ph'=>"体積 (V)",'acc_ph'=>"加速度 (a)",'geom_title'=>"幾何学",'rect_title'=>"長方形の面積",'circle_title'=>"円の面積",'side_a'=>"辺 A (m)",'side_b'=>"辺 B (m)",'radius'=>"半径 (r)",'res_area'=>"面積",'res_perim'=>"周囲の長さ"],
    'cn' => ['name'=>"简体中文",'title'=>'计算器','std'=>'标准','eng'=>'科学','res'=>'结果','hist'=>'历史','empty_hist'=>'历史记录为空','curr'=>'货币','biz'=>'商业','time'=>'时间','mass'=>'质量','dist'=>'距离','temp'=>'温度','settings'=>'设置','fuel'=>'燃料','geo'=>'几何','phys'=>'物理','health'=>'健康','loan'=>'贷款','vol'=>'体积','flag'=>'🇨🇳','op_plus'=>"加法 (+)",'op_minus'=>"减法 (-)",'op_mult'=>"乘法 (×)",'op_div'=>"除法 (÷)",'op_pow'=>"乘方 (x^y)",'op_perc'=>"百分比 (%)",'op_sq'=>"平方 (x²)",'op_cub'=>"立方 (x³)",'op_sqrt'=>"平方根 (√)",'op_sin'=>"正弦 (sin)",'op_cos'=>"余弦 (cos)",'op_tan'=>"正切 (tan)",'op_fact'=>"阶乘 (n!)",'bmi_thin'=>"偏瘦",'bmi_normal'=>"正常",'bmi_over'=>"超重",'bmi_obese'=>"肥胖",'clear_hist'=>"清除历史",'loan_sum'=>'贷款金额','loan_rate'=>'年利率 (%)','loan_term'=>'期限 (月)','loan_m'=>'月供','loan_t'=>'总计','f_dist'=>'距离 (km)','f_cons'=>'油耗 (L/100km)','f_res'=>'油量','p_dist'=>'距离 (S)','p_time'=>'时间 (T)','p_speed'=>'速度 (V=S/T)','clear'=>'清除','modules'=>'模块','time_conv'=>'时间','bmi_title'=>'BMI 健康','bmi_w'=>'体重 (kg)','bmi_h'=>'身高 (cm)','m_in'=>'输入金额','c_from'=>'从货币','c_to'=>'到货币','geo_r'=>'半径','geo_s'=>'面积','m_kg'=>'Kg','m_gr'=>'克','m_sn'=>'担','m_tn'=>'吨','m_lb'=>'磅','d_km'=>'公里','d_cm'=>'厘米','d_m'=>'米','d_mi'=>'英里','d_ft'=>'英尺', 't_s'=>'秒','t_m'=>'分','t_h'=>'小时','t_d'=>'天','t_w'=>'周','t_mo'=>'月','t_y'=>'年','dens_title'=>"密度 (ρ = m / V)",'force_title'=>"力 (F = m * a)",'mass_ph'=>"质量 (m)",'vol_ph'=>"体积 (V)",'acc_ph'=>"加速度 (a)",'geom_title'=>"几何",'rect_title'=>"长方形面积",'circle_title'=>"圆面积",'side_a'=>"边 A (m)",'side_b'=>"边 B (m)",'radius'=>"半径 (r)",'res_area'=>"面积",'res_perim'=>"周长"],
    'ar' => ['name'=>"العربية",'title'=>'حاسبة','std'=>'قياسي','eng'=>'علمي','res'=>'نتيجة','hist'=>'سجل','empty_hist'=>'السجل فارغ','curr'=>'عملة','biz'=>'أعمال','time'=>'وقت','mass'=>'كتلة','dist'=>'مسافة','temp'=>'حرارة','settings'=>'إعدادات','fuel'=>'وقود','geo'=>'هندسة','phys'=>'فيزياء','health'=>'صحة','loan'=>'قرض','vol'=>'حجم','flag'=>'🇸🇦','op_plus'=>"جمع (+)",'op_minus'=>"طرح (-)",'op_mult'=>"ضرب (×)",'op_div'=>"قسمة (÷)",'op_pow'=>"رفع للقوة (x^y)",'op_perc'=>"نسبة مئوية (%)",'op_sq'=>"تربيع (x²)",'op_cub'=>"تكعيب (x³)",'op_sqrt'=>"جذر تربيعي (√)",'op_sin'=>"جيب (sin)",'op_cos'=>"جيب التمام (cos)",'op_tan'=>"ظل (tan)",'op_fact'=>"عاملي (n!)",'bmi_thin'=>"نحيف",'bmi_normal'=>"طبيعي",'bmi_over'=>"وزن زائد",'bmi_obese'=>"سمنة",'clear_hist'=>"مسح السجل",'loan_sum'=>'مبلغ القرض','loan_rate'=>'نسبة سنوية (%)','loan_term'=>'المدة (أشهر)','loan_m'=>'شهريا','loan_t'=>'الإجمالي','f_dist'=>'المسافة (كم)','f_cons'=>'الاستهلاك (لتر/100كم)','f_res'=>'كمية الوقود','p_dist'=>'المسافة (S)','p_time'=>'الوقت (T)','p_speed'=>'السرعة (V=S/T)','clear'=>'مسح','modules'=>'وحدات','time_conv'=>'وقت','bmi_title'=>'مؤشر الصحة','bmi_w'=>'الوزن (كجم)','bmi_h'=>'الطول (سم)','m_in'=>'أدخل المبلغ','c_from'=>'من عملة','c_to'=>'إلى عملة','geo_r'=>'نصف القطر','geo_s'=>'المساحة','m_kg'=>'كجم','m_gr'=>'جرام','m_sn'=>'قنطار','m_tn'=>'طن','m_lb'=>'رطل','d_km'=>'كم','d_cm'=>'سنتيمتر','d_m'=>'متر','d_mi'=>'ميل','d_ft'=>'قدم','t_s'=>'ثانية','t_m'=>'دقيقة','t_h'=>'ساعة','t_d'=>'يوم','t_w'=>'أسبوع','t_mo'=>'شهر','t_y'=>'سنة','dens_title'=>"الكثافة (ρ = m / V)",'force_title'=>"القوة (F = m * a)",'mass_ph'=>"(m) الكتلة",'vol_ph'=>"(V) الحجم",'acc_ph'=>"(a) التسارع",'geom_title'=>"الهندسة",'rect_title'=>"مساحة المستطيل",'circle_title'=>"مساحة الدائرة",'side_a'=>"الضلع A (م)",'side_b'=>"الضلع B (م)",'radius'=>"نصف القطر (r)",'res_area'=>"المساحة",'res_perim'=>"المحيط"],
    'tj' => ['name'=>"Tojikī",'title'=>'Калкулятор','std'=>'Оддӣ','eng'=>'Илмӣ','res'=>'Натиҷа','hist'=>'Таърих','empty_hist'=>'Таърих холӣ аст','curr'=>'Асъор','biz'=>'Бизнес','time'=>'Вақт','mass'=>'Вазн','dist'=>'Масофа','temp'=>'Ҳарорат','settings'=>'Танзимот','fuel'=>'Сӯзишворӣ','geo'=>'Геометрия','phys'=>'Физика','health'=>'Саломатӣ','loan'=>'Қарз','vol'=>'Ҳаҷм','flag'=>'🇹🇯','op_plus'=>"Ҷамъ (+)",'op_minus'=>"Тарҳ (-)",'op_mult'=>"Зарб (×)",'op_div'=>"Таксим (÷)",'op_pow'=>"Дараҷа (x^y)",'op_perc'=>"Файз (%)",'op_sq'=>"Квадрат (x²)",'op_cub'=>"Куб (x³)",'op_sqrt'=>"Решаи квадратӣ (√)",'op_sin'=>"Синус (sin)",'op_cos'=>"Косинус (cos)",'op_tan'=>"Тангенス (tan)",'op_fact'=>"Факториал (n!)",'bmi_thin'=>"Лоғар",'bmi_normal'=>"Муътадил",'bmi_over'=>"Вазни зиёд",'bmi_obese'=>"Фарбеҳӣ",'clear_hist'=>"Пок кардани таърих",'loan_sum'=>'Маблағи қарз','loan_rate'=>'Фоизи солона (%)','loan_term'=>'Мӯҳлат (моҳ)','loan_m'=>'Моҳона','loan_t'=>'Ҷамъ','f_dist'=>'Масофа (км)','f_cons'=>'Сарф (л/100км)','f_res'=>'Миқдори сӯзишворӣ','p_dist'=>'Масофа (S)','p_time'=>'Вақт (T)','p_speed'=>'Суръат (V=S/T)','clear'=>'Тоза карdan','modules'=>'МОДУЛҲО','time_conv'=>'ВАҚТ','bmi_title'=>'ИМТ САЛОМАТӢ','bmi_w'=>'Вазн (кг)','bmi_h'=>'Қад (см)','m_in'=>'Маблағро ворид кунед','c_from'=>'Аз асъор','c_to'=>'Ба асъор','geo_r'=>'Радиус','geo_s'=>'Масоҳат','m_kg'=>'Кг','m_gr'=>'Грамм','m_sn'=>'Сентнер','m_tn'=>'Тонна','m_lb'=>'Фунт','d_km'=>'Км','d_cm'=>'Сантиметр','d_m'=>'Метр','d_mi'=>'Мил','d_ft'=>'Фут','t_s'=>'Сония','t_m'=>'Дақиқа','t_h'=>'Соат','t_d'=>'Рӯз','t_w'=>'Ҳафта','t_mo'=>'Моҳ','t_y'=>'Сол','dens_title'=>"Зичӣ (ρ = m / V)",'force_title'=>"Қувва (F = m * a)",'mass_ph'=>"Масса (m)",'vol_ph'=>"Ҳаҷм (V)",'acc_ph'=>"Шитоб (a)",'geom_title'=>"Геометрия",'rect_title'=>"Масоҳати росткунҷа",'circle_title'=>"Масоҳати доира",'side_a'=>"Тарафи A (м)",'side_b'=>"Тарафи B (м)",'radius'=>"Радиус (r)",'res_area'=>"Масоҳат",'res_perim'=>"Периметр"],
    'kz' => ['name'=>"Қазақша",'title'=>'Калькулятор','std'=>'Қарапайым','eng'=>'Ғылыми','res'=>'Нәтиже','hist'=>'Тарих','empty_hist'=>'Тарих бос','curr'=>'Валюта','biz'=>'Бизнес','time'=>'Уақыт','mass'=>'Масса','dist'=>'Қашықтық','temp'=>'Температура','settings'=>'Баптау','fuel'=>'Жанармай','geo'=>'Геометрия','phys'=>'Физика','health'=>'Денсаулық','loan'=>'Несие','vol'=>'Көлем','flag'=>'🇰🇿','op_plus'=>"Қосу (+)",'op_minus'=>"Алу (-)",'op_mult'=>"Көбейту (×)",'op_div'=>"Бөлу (÷)",'op_pow'=>"Дәрежелеу (x^y)",'op_perc'=>"Пайыз (%)",'op_sq'=>"Квадрат (x²)",'op_cub'=>"Куб (x³)",'op_sqrt'=>"Квадрат түбір (√)",'op_sin'=>"Синус (sin)",'op_cos'=>"Косинус (cos)",'op_tan'=>"Тангенс (tan)",'op_fact'=>"Факториал (n!)",'bmi_thin'=>"Арық",'bmi_normal'=>"Қалыпты",'bmi_over'=>"Артық салмақ",'bmi_obese'=>"Семіздік",'clear_hist'=>"Тарихты тазалау",'loan_sum'=>'Несие сомасы','loan_rate'=>'Жылдық пайыз (%)','loan_term'=>'Мерзімі (ай)','loan_m'=>'Ай сайын','loan_t'=>'Барлығы','f_dist'=>'Қашықтық (км)','f_cons'=>'Шығын (л/100км)','f_res'=>'Жанармай көлемі','p_dist'=>'Қашықтық (S)','p_time'=>'Уақыт (T)','p_speed'=>'Жылдамдық (V=S/T)','clear'=>'Тазарту','modules'=>'МОДУЛЬДЕР','time_conv'=>'УАҚЫТ','bmi_title'=>'ДКИ САУЛЫҚ','bmi_w'=>'Салмақ (кг)','bmi_h'=>'Бойы (см)','m_in'=>'Соманы енгізіңіз','c_from'=>'Қай валютадан','c_to'=>'Қай валютаға','geo_r'=>'Радиус','geo_s'=>'Ауданы','m_kg'=>'Кг','m_gr'=>'Грамм','m_sn'=>'Центнер','m_tn'=>'Тонна','m_lb'=>'Фунт','d_km'=>'Км','d_cm'=>'Сантиметр','d_m'=>'Метр','d_mi'=>'Миля','d_ft'=>'Фут','t_s'=>'Секунд','t_m'=>'Минут','t_h'=>'Сағат','t_d'=>'Күн','t_w'=>'Апта','t_mo'=>'Ай','t_y'=>'Жыл','dens_title'=>"Тығыздық (ρ = m / V)",'force_title'=>"Күш (F = m * a)",'mass_ph'=>"Масса (m)",'vol_ph'=>"Көлем (V)",'acc_ph'=>"Үдеу (a)",'geom_title'=>"Геометрия",'rect_title'=>"Тіктөртбұрыш ауданы",'circle_title'=>"Шеңбер ауданы",'side_a'=>"А қабырғасы (м)",'side_b'=>"В қабырғасы (м)",'radius'=>"Радиус (r)",'res_area'=>"Ауданы",'res_perim'=>"Периметрі"],
    'kr' => ['name'=>"한국어",'title'=>'계산기','std'=>'표준','eng'=>'공학용','res'=>'결과','hist'=>'기록','empty_hist'=>'내역이 없습니다','curr'=>'통화','biz'=>'비즈니스','time'=>'시간','mass'=>'질량','dist'=>'거리','temp'=>'온도','settings'=>'설정','fuel'=>'연료', 'geo'=>'기하학','phys'=>'물리학','health'=>'건강','loan'=>'대출','vol'=>'음량','flag'=>'🇰🇷','op_plus'=>"덧셈 (+)",'op_minus'=>"뺄셈 (-)",'op_mult'=>"곱셈 (×)",'op_div'=>"나눗셈 (÷)",'op_pow'=>"거듭제곱 (x^y)",'op_perc'=>"백분율 (%)",'op_sq'=>"제곱 (x²)",'op_cub'=>"세제곱 (x³)",'op_sqrt'=>"제곱근 (√)",'op_sin'=>"사인 (sin)",'op_cos'=>"코사인 (cos)",'op_tan'=>"탄젠트 (tan)",'op_fact'=>"계승 (n!)",'bmi_thin'=>"저체중",'bmi_normal'=>"정상",'bmi_over'=>"과체중",'bmi_obese'=>"비만",'clear_hist'=>"내역 삭제",'loan_sum'=>'대출 금액','loan_rate'=>'연이율 (%)','loan_term'=>'기간 (월)','loan_m'=>'월불입액','loan_t'=>'총액','f_dist'=>'거리 (km)','f_cons'=>'연비 (L/100km)','f_res'=>'연료량','p_dist'=>'거리 (S)','p_time'=>'시간 (T)','p_speed'=>'속도 (V=S/T)','clear'=>'삭제','modules'=>'모듈','time_conv'=>'시간','bmi_title'=>'BMI 건강','bmi_w'=>'체중 (kg)','bmi_h'=>'키 (cm)','m_in'=>'금액 입력','c_from'=>'기준 통화','c_to'=>'대상 통화','geo_r'=>'원 반지름','geo_s'=>'면적','m_kg'=>'Kg','m_gr'=>'그램','m_sn'=>'센트너','m_tn'=>'톤','m_lb'=>'파운드','d_km'=>'Km', 'd_cm'=>'센티미터','d_m'=>'미터','d_mi'=>'마일','d_ft'=>'피트','t_s'=>'초','t_m'=>'분','t_h'=>'시간','t_d'=>'일','t_w'=>'주','t_mo'=>'월','t_y'=>'년','dens_title'=>"밀도 (ρ = m / V)",'force_title'=>"힘 (F = m * a)",'mass_ph'=>"질량 (m)",'vol_ph'=>"부피 (V)",'acc_ph'=>"가속도 (a)",'geom_title'=>"기하학",'rect_title'=>"직사각형 면적",'circle_title'=>"원 면적",'side_a'=>"가로 A (m)",'side_b'=>"세로 B (m)",'radius'=>"반지름 (r)",'res_area'=>"면적",'res_perim'=>"둘레"]];
$t = isset($translations[$lang]) ? $translations[$lang] : $translations['uz'];
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>TITAN - Ko'p funksiyali onlayn kalkulyator</title>
    <meta name="description" content="Valyuta kursi, Kredit, BMI va Fizika hisob-kitoblari uchun eng zamonaviy kalkulyator.">
    <meta name="keywords" content="kalkulyator, onlayn kalkulyator, dollar kursi, kredit hisoblash, BMI, titan calc">
    
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Exo+2:wght@300;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W7DWZ9N8');</script>
<!-- End Google Tag Manager -->

    <style>
        :root {
            --bg: #05070a;
            --card: #0f121a;
            --text: #ffffff;
            --primary: #00d2ff;
            --secondary: #3a7bd5;
            --border: #1e2633;
            --input-bg: #080a0f;
            --key-bg: #161b26;
            --danger: #ff4b2b;
            --success: #00ff87;
        }
        body.light-mode {
            --bg: #f0f4f8;
            --card: #ffffff;
            --text: #1a202c;
            --primary: #3182ce;
            --secondary: #63b3ed;
            --border: #e2e8f0;
            --input-bg: #edf2f7;
            --key-bg: #ffffff;
        }
        body { 
            background: var(--bg); color: var(--text); font-family: 'Exo 2', sans-serif; 
            margin: 0; padding: 0; transition: all 0.4s ease; overflow-x: hidden;
        }
        #clockBox { text-align: center; padding: 12px; font-family: 'Orbitron', sans-serif; color: var(--primary); font-size: 1.2rem; text-shadow: 0 0 12px var(--primary); }
        .main-header { display: flex; align-items: center; justify-content: space-between; padding: 15px 25px; background: var(--card); border-bottom: 3px solid var(--secondary); position: sticky; top: 0; z-index: 900; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        .main-header h1 { font-size: 1.3rem; margin: 0; font-weight: 550; letter-spacing: 1px; }
        .container { max-width: 450px; margin: 0 auto; padding: 20px; box-sizing: border-box; }
        .display-unit { background: var(--card); padding: 25px; border-radius: 28px; margin-bottom: 18px; border: 2px solid var(--border); text-align: right; position: relative; overflow: hidden; box-shadow: inset 0 0 18px rgba(0,0,0,0.5); }
        .display-unit::before { content: ""; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary); }
        .res-label { font-size: 0.8rem; opacity: 0.5; text-transform: uppercase; margin-bottom: 10px; }
        .res-value { font-size: 3.5rem; font-family: 'Orbitron', sans-serif; color: var(--primary); word-wrap: break-word; }
        .field-group { margin-bottom: 18px; }
        .main-input { width: 100%; padding: 18px; background: var(--input-bg); border: 2px solid var(--border); border-radius: 20px; color: var(--text); font-size: 1.2rem; font-weight: 530; outline: none; box-sizing: border-box; transition: 0.3s; }
        .main-input:focus { border-color: var(--primary); box-shadow: 0 0 15px rgba(0,210,255,0.3); }
        select.main-input { appearance: none; cursor: pointer; background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"><path d="M7 10l5 5 5-5z"/></svg>'); background-repeat: no-repeat; background-position: right 15px center; }
        .keyboard { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
        .key { height: 45px; background: var(--key-bg); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 620; cursor: pointer; border: 1px solid var(--border); box-shadow: 0 4px 0 var(--border); transition: all 0.1s; color: var(--text); }
        .key:active { transform: translateY(4px); box-shadow: 0 0 0 var(--border); background: var(--primary); color: white; }
        .key-op { color: var(--primary); background: rgba(0,210,255,0.05); }
        .key-eq { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; border: none; }
        .key-clear { color: var(--danger); }
        .full-panel { position: fixed; top: 0; left: 100%; width: 100%; height: 100%; background: var(--bg); z-index: 1700; transition: 0.5s cubic-bezier(0.77, 0, 0.175, 1); padding: 50px; box-sizing: border-box; overflow-y: auto; }
        .full-panel.open { left: 0; }
        .panel-header { display: flex; align-items: center; gap: 18px; margin-bottom: 20px; }
        .panel-header i { font-size: 1.8rem; cursor: pointer; color: var(--primary); }
        .mega-menu { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .menu-card { background: var(--card); padding: 28px 18px; border-radius: 25px; text-align: center; border: 2px solid var(--border); cursor: pointer; transition: 0.3s; }
        .menu-card:hover { border-color: var(--primary); transform: translateY(-5px); }
        .menu-card i { font-size: 2.2rem; color: var(--primary); margin-bottom: 15px; display: block; }
        .menu-card span { font-weight: 600; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; }
        .tool-card { background: var(--card); padding: 20px; border-radius: 22px; margin-bottom: 18px; border: 1px solid var(--border); }
        .tool-card h3 { margin-top: 0; border-bottom: 1px solid var(--border); padding-bottom: 10px; font-size: 1rem; color: var(--primary); }
        .tool-result { margin-top: 15px; padding: 15px; background: var(--input-bg); border-radius: 15px; text-align: center; }
        .tool-result b { font-size: 1.4rem; color: var(--success); }
        .lang-link { display: flex; align-items: center; justify-content: space-between; padding: 20px; background: var(--card); border-radius: 20px; margin-bottom: 10px; text-decoration: none; color: var(--text); border: 1px solid var(--border); }
        .lang-link:hover { border-color: var(--primary); }
.lang-option {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 25px;
    background: var(--card); 
    border: 2px solid var(--border);
    border-radius: 20px;
    margin-bottom: 12px;
    text-decoration: none;
    color: var(--text);
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.lang-option:hover {
    border-color: var(--primary);
    background: rgba(0, 210, 255, 0.05);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.lang-option span:first-child {
    font-weight: 550;
    font-size: 1.1rem;
}

.lang-option span:last-child {
    font-size: 1.2rem;
}

/* 1. ASOSIY PANEL */
.full-panel {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: 9999;
    background: #0f172a;
    overflow-y: auto;
    overflow-x: hidden;
}

.full-panel.active {
    display: block !important;
}

/* 2. MEGA-MENU KONTEYNERI */
.mega-menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Qat'iy 2 ustun */
    /* Telefonda jichcha (5px), kompyuterda kengroq (20px) masofa */
    gap: clamp(5px, 2vw, 20px); 
    /* Telefonda chetdagi bo'shliq minimal (8px), kompyuterda (30px) */
    padding: clamp(8px, 3vw, 30px); 
    width: 100%;
    /* Kompyuterda eni juda yoyilmasligi uchun */
    max-width: 1200px; 
    margin: 0 auto;
    box-sizing: border-box;
}

/* 3. MENU KARTALARI (Siz so'ragan eni uzun, bo'yi kalta shakl) */
.menu-card {
    width: 100%;
    /* aspect-ratio olib tashlandi, o'rniga padding-top ishlatamiz */
    background: #1e293b;
    border: 1px solid #334155;
    border-radius: 12px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    /* BO'YINI NAZORAT QILISH: padding orqali balandlik beramiz */
    padding: clamp(20px, 5vh, 40px) 10px; 
    cursor: pointer;
    transition: all 0.3s ease;
    box-sizing: border-box;
    text-decoration: none;
}

.menu-card:hover {
    border-color: #00d4ff;
    background: #161e2e;
    transform: translateY(-3px);
}

/* Ikonka o'lchami */
.menu-card i {
    color: #00d4ff;
    /* Ekran kengligiga qarab o'zgaradi */
    font-size: clamp(28px, 6vw, 50px); 
    margin-bottom: 10px;
}

/* Yozuv o'lchami */
.menu-card span {
    color: white;
    font-size: clamp(11px, 2vw, 16px);
    font-weight: 700;
    text-align: center;
    text-transform: uppercase;
    line-height: 1.1;
}

/* ------------------------------------------------------
   MAXSUS MOSLASHUV (RESPONSIVE)
--------------------------------------------------------- */

/* KOMPYUTER UCHUN (Noutbuk va Monitor) */
@media (min-width: 1024px) {
    .mega-menu {
        max-width: 900px; /* Markazda chiroyli turishi uchun */
        gap: 25px;
    }
    .menu-card {
        /* Kompyuterda balandlikni aniq chegaralaymiz */
        /* Shunda eni uzun, bo'yi qisqa bo'ladi */
        height: 140px; 
    }
    .menu-card i { font-size: 45px; }
}

/* TELEFON UCHUN (Maksimal darajada ekranni to'ldirish) */
@media (max-width: 500px) {
    .mega-menu {
        padding: 10px; /* Chetdagi qora joylarni kamaytirish */
        gap: 10px;     /* Kartalar orasini jipslashtirish */
    }
    .menu-card {
        height: auto;
        min-height: 150px; /* Telefonda juda kichik bo'lib ketmasligi uchun */
    }
}

    </style>
</head>
<body class="<?= ($_COOKIE['theme'] ?? 'dark') == 'light' ? 'light-mode' : '' ?>">

<header class="main-header">
    <h3><i class="fas fa-microchip"></i> <?= $t['title'] ?> </h3>
    <div style="display:flex; gap:15px; align-items:center;">
        <div id="clockBox">00:00:00</div>
        <i class="fas fa-palette" onclick="toggleTheme()" style="font-size:1.5rem; cursor:pointer;"></i>
        <i class="fas fa-grip-vertical" onclick="openPanel('pMegaMenu')" style="font-size:1.5rem; cursor:pointer;"></i>
    </div>
</header>

<div class="container">
    <div class="display-unit">
        <div class="res-label"><?= $t['res'] ?></div>
        <div class="res-value" id="liveDisplay">0</div>
    </div>
   <div id="calc"></div>
        <div class="field-group">
            <input type="number" step="any" id="val1" class="main-input" placeholder="0" readonly>
        </div>
        <div class="field-group">
            <select name="amal" id="opSelect" class="main-input">
    <option value="plus" selected><?= $t['op_plus'] ?></option>
    <option value="minus"><?= $t['op_minus'] ?></option>
    <option value="kopaytir"><?= $t['op_mult'] ?></option>
    <option value="bol"><?= $t['op_div'] ?></option>
    <option value="daraja"><?= $t['op_pow'] ?></option>
    <option value="foiz"><?= $t['op_perc'] ?></option>
    <option value="kvadrat"><?= $t['op_sq'] ?></option>
    <option value="kub"><?= $t['op_cub'] ?></option>
    <option value="ildiz"><?= $t['op_sqrt'] ?></option>
    <option value="sin"><?= $t['op_sin'] ?></option>
    <option value="cos"><?= $t['op_cos'] ?></option>
    <option value="tan"><?= $t['op_tan'] ?></option>
    <option value="fact"><?= $t['op_fact'] ?></option>
</select>
        </div>
        <div class="field-group" id="secGroup">
            <input type="number" step="any" id="val2" class="main-input" placeholder="0" readonly>
        </div>
        <div class="keyboard">
            <div class="key key-clear" onclick="resetAll()">AC</div>
            <div class="key key-op" onclick="deleteChar()"><i class="fas fa-backspace"></i></div>
            <div class="key key-op" onclick="switchField()"><i class="fas fa-sync"></i></div>
            <button type="button" onclick="calculateResult()" class="key key-eq">=</button>
            <div class="key" onclick="addNum(7)">7</div><div class="key" onclick="addNum(8)">8</div><div class="key" onclick="addNum(9)">9</div>
            <div class="key key-op" onclick="setFastOp('kopaytir')">×</div>
            <div class="key" onclick="addNum(4)">4</div><div class="key" onclick="addNum(5)">5</div><div class="key" onclick="addNum(6)">6</div>
            <div class="key key-op" onclick="setFastOp('minus')">-</div>
            <div class="key" onclick="addNum(1)">1</div><div class="key" onclick="addNum(2)">2</div><div class="key" onclick="addNum(3)">3</div>
            <div class="key key-op" onclick="setFastOp('plus')">+</div>
            <div class="key" onclick="addNum(0)">0</div><div class="key" onclick="addNum('.')">.</div>
            <div class="key" onclick="addNum('00')">00</div>
            <div class="key key-op" onclick="setFastOp('bol')">÷</div>
        </div>
    </div>
</div>

<div id="pMegaMenu" class="full-panel">
    <div class="panel-header"><i class="fas fa-chevron-left" onclick="closeAllPanels()"></i> <h3><?= $t['modules'] ?></h3></div>
    <div class="mega-menu">
        <div class="menu-card" onclick="openPanel('pCurrency')"><i class="fas fa-coins"></i><span><?= $t['curr'] ?></span></div>
        <div class="menu-card" id="credit-card-nav" onclick="openPanel('loan-module')"><i class="fas fa-university"></i><span>KREDIT</span></div>
        <div class="menu-card" onclick="openPanel('pHealth')"><i class="fas fa-heart-pulse"></i><span><?= $t['health'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pGeom')"><i class="fas fa-drafting-compass"></i><span><?= $t['geom_title'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pPhys')"><i class="fas fa-flask"></i><span><?= $t['phys'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pMass')"><i class="fas fa-weight-hanging"></i><span><?= $t['mass'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pDist')"><i class="fas fa-ruler-horizontal"></i><span><?= $t['dist'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pVol')"><i class="fas fa-fill-drip"></i><span><?= $t['vol'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pFuel')"><i class="fas fa-gas-pump"></i><span><?= $t['fuel'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pTime')"><i class="fas fa-hourglass-half"></i><span><?= $t['time'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pHistory')"><i class="fas fa-scroll"></i><span><?= $t['hist'] ?></span></div>
        <div class="menu-card" onclick="openPanel('pSettings')"><i class="fas fa-sliders"></i><span><?= $t['settings'] ?></span></div>
    </div>
</div>

<div id="pCurrency" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['curr'] ?></h3>
    </div>
    <div class="tool-card">
        <p><?= $t['m_in'] ?>:</p>
        <input type="number" id="curAmount" oninput="doCurrency()" class="main-input" placeholder="0.00">
        
        <p style="margin-top:15px;"><?= $t['c_from'] ?>:</p>
        <select id="curFrom" onchange="doCurrency()" class="main-input">
            <option value="1">Yuklanmoqda...</option>
        </select>
        
        <p style="margin-top:15px;"><?= $t['c_to'] ?>:</p>
        <select id="curTo" onchange="doCurrency()" class="main-input">
            <option value="1">Yuklanmoqda...</option>
        </select>
        
        <div class="tool-result">
            <b id="curResult">0.00</b>
        </div>
    </div>
</div>


<div id="loan-module" class="full-panel" style="display: none; background: #0f172a; color: white; height: 100vh; position: fixed; top: 0; left: 0; width: 100%; z-index: 9999; overflow: hidden; box-sizing: border-box;">
    
    <div class="panel-header" style="display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #1e293b; background: #0f172a; position: absolute; top: 0; left: 0; width: 100%; height: 60px; box-sizing: border-box; z-index: 20;">
        <i class="fas fa-arrow-left" onclick="closeLoanPanel()" style="color: #00d4ff; font-size: 22px; cursor: pointer; padding: 5px;"></i>
        <h3 style="margin: 0 0 0 15px; color: #00d4ff; text-transform: uppercase; font-size: 16px; white-space: nowrap;">
            <i class="fas fa-percent"></i> KREDIT & ALIMENT
        </h3>
    </div>

    <div class="panel-body" style="padding: 15px; position: absolute; top: 60px; bottom: 0; left: 0; width: 100%; overflow-y: auto; box-sizing: border-box; -webkit-overflow-scrolling: touch;">
        
        <div style="margin-bottom: 25px; width: 100%;">
            <div class="input-group" style="margin-bottom: 15px;">
                <label style="color: #94a3b8; font-size: 13px; display: block; margin-bottom: 5px;">Kredit turi</label>
                <select id="loanCategory" onchange="updateLoanDefaults()" style="width: 100%; padding: 14px; background: #1e293b url('data:image/svg+xml;charset=US-ASCII,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%2300d4ff%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22></polyline></svg>') no-repeat right 15px center; background-size: 18px; -webkit-appearance: none; appearance: none; color: white; border: 1px solid #334155; border-radius: 10px; outline: none; font-size: 15px;">
                    <option value="personal">Iste'mol krediti (Mikro qarz)</option>
                    <option value="avto">Avtokredit</option>
                    <option value="ipoteka">Ipoteka</option>
                </select>
            </div>

            <div class="input-group" style="margin-bottom: 15px;">
                <label style="color: #94a3b8; font-size: 13px; display: block; margin-bottom: 5px;">Umumiy miqdor (so'm)</label>
                <input type="number" id="loanSum" placeholder="Masalan: 50000000" style="width: 100%; padding: 14px; background: #1e293b; color: white; border: 1px solid #334155; border-radius: 10px; box-sizing: border-box; outline: none;">
            </div>

            <div class="input-group" style="margin-bottom: 15px;">
                <label style="color: #94a3b8; font-size: 13px; display: block; margin-bottom: 5px;">Boshlang'ich to'lov (so'm)</label>
                <input type="number" id="downPayment" value="0" style="width: 100%; padding: 14px; background: #1e293b; color: white; border: 1px solid #334155; border-radius: 10px; box-sizing: border-box; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 20px;">
                <div>
                    <label style="color: #94a3b8; font-size: 12px; display: block; margin-bottom: 5px;">Yillik foiz (%)</label>
                    <input type="number" id="loanRate" value="28" style="width: 100%; padding: 14px; background: #1e293b; color: white; border: 1px solid #334155; border-radius: 10px; box-sizing: border-box; outline: none;">
                </div>
                <div>
                    <label style="color: #94a3b8; font-size: 12px; display: block; margin-bottom: 5px;">Muddati (oy)</label>
                    <input type="number" id="loanTerm" value="12" style="width: 100%; padding: 14px; background: #1e293b; color: white; border: 1px solid #334155; border-radius: 10px; box-sizing: border-box; outline: none;">
                </div>
            </div>

            <button onclick="calculateUzLoan()" style="width: 100%; padding: 15px; background: #00d4ff; color: #000; border: none; border-radius: 10px; font-weight: bold; text-transform: uppercase; cursor: pointer;">Kreditni hisoblash</button>

            <div id="loanResult" style="display:none; margin-top: 15px; padding: 15px; background: rgba(0, 212, 255, 0.1); border: 1px dashed #00d4ff; border-radius: 12px;">
                <p style="font-size: 13px; margin: 5px 0;">Sizga beriladigan qarz: <b id="resPureLoan" style="color: white;">0</b> so'm</p>
                <p style="font-size: 13px; margin: 5px 0;">Oylik to'lov: <b id="resMonthly" style="color: #00d4ff;">0</b> so'm</p>
                <p style="font-size: 13px; margin: 5px 0;">Jami to'lov: <b id="resTotal" style="color: #00d4ff;">0</b> so'm</p>
            </div>
        </div>

        <div style="padding: 20px 15px; background: #161e2e; border-radius: 15px; border: 1px solid #334155; width: 100%; box-sizing: border-box;">
            <h4 style="text-align: center; color: #00d4ff; margin: 0 0 20px 0; text-transform: uppercase; font-size: 15px;">Aliment Kalkulyatori</h4>
            
            <div class="input-group" style="margin-bottom: 15px;">
                <label style="color: #94a3b8; font-size: 12px; display: block; margin-bottom: 5px;">Oylik ish haqi (so'm)</label>
                <input type="number" id="salary_input" placeholder="Masalan: 4000000" style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid #334155; color: white; border-radius: 8px; outline: none; box-sizing: border-box;">
            </div>

            <div class="input-group" style="margin-bottom: 20px;">
                <label style="color: #94a3b8; font-size: 12px; display: block; margin-bottom: 5px;">Bolalar sonini tanlang</label>
                <select id="child_count" style="width: 100%; padding: 12px; background: #0f172a url('data:image/svg+xml;charset=US-ASCII,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%2300d4ff%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22></polyline></svg>') no-repeat right 12px center; background-size: 16px; -webkit-appearance: none; appearance: none; border: 1px solid #334155; color: white; border-radius: 8px; outline: none; font-size: 14px;">
                    <option value="0.25">1 ta bola uchun (25%)</option>
                    <option value="0.33">2 ta bola uchun (33.3%)</option>
                    <option value="0.50">3 va undan ko'p (50%)</option>
                </select>
            </div>

            <button onclick="calculateAliment()" style="width: 100%; padding: 12px; background: #00d4ff; color: #000; border: none; border-radius: 8px; font-weight: bold; text-transform: uppercase; cursor: pointer;">Alimentni hisoblash</button>
            
            <div id="alimentResult" style="display:none; margin-top: 15px; text-align: center; padding: 10px; background: rgba(0, 212, 255, 0.05); border-radius: 8px;">
                <p style="color: #94a3b8; margin-bottom: 5px; font-size: 13px;">Oylik aliment summasi:</p>
                <b id="res_sum" style="color: #00d4ff; font-size: 18px;">0</b> <span style="color: #00d4ff;">so'm</span>
            </div>

            <p style="font-size: 10px; color: #64748b; text-align: center; margin-top: 15px; line-height: 1.4;">
                * Ushbu hisob-kitob, O'zbekiston Respublikasi Oila kodeksiga asosan taxminiy hisoblandi!
            </p>
        </div>
        
        <div style="height: 30px;"></div>
    </div>
</div>

<div id="pMass" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['mass'] ?></h3>
    </div>
    
    <div class="tool-card">
        <input type="number" id="mIn" oninput="doMass()" class="main-input" placeholder="<?= $t['m_kg'] ?>">
        
        <div class="tool-result">
            <p><?= $t['m_gr'] ?>: <b id="m_gr">0</b></p>
            <p><?= $t['m_sn'] ?>: <b id="m_sn">0</b></p>
            <p><?= $t['m_tn'] ?>: <b id="m_tn">0</b></p>
            <p><?= $t['m_lb'] ?>: <b id="m_lb">0</b></p>
        </div>
    </div>
</div>

<div id="pDist" class="full-panel">
    <div class="panel-header"><i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> <h3><?= $t['dist'] ?></h3></div>
    <div class="tool-card">
        <input type="number" id="dIn" oninput="doDist()" class="main-input" placeholder="Km">
        <div class="tool-result">
            <p><?= $t['d_cm'] ?>: <b id="d_cm">0</b></p>
            <p><?= $t['d_m'] ?>: <b id="d_m">0</b></p>
            <p><?= $t['d_mi'] ?>: <b id="d_mi">0</b></p>
            <p><?= $t['d_ft'] ?>: <b id="d_ft">0</b></p>
        </div>
    </div>
</div>

<div id="pTime" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['time_conv'] ?></h3>
    </div>
    <div class="tool-card">
        <input type="number" id="tIn" oninput="doTime()" class="main-input" placeholder="<?= $t['t_h'] ?>">
        
        <div class="tool-result">
            <p><?= $t['t_s'] ?>: <b id="t_s">0</b></p>
            <p><?= $t['t_m'] ?>: <b id="t_m">0</b></p>
            <p><?= $t['t_d'] ?>: <b id="t_d">0</b></p>
            <p><?= $t['t_w'] ?>: <b id="t_w">0</b></p>
            <p><?= $t['t_mo'] ?>: <b id="t_mo">0</b></p>
            <p><?= $t['t_y'] ?>: <b id="t_y">0</b></p>
        </div>
    </div>
</div>

<div id="pHealth" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['bmi_title'] ?></h3>
    </div>
    <div class="tool-card">
        <input type="number" id="healthW" class="main-input" placeholder="<?= $t['bmi_w'] ?>" oninput="doBMI()">
        <input type="number" id="healthH" class="main-input" placeholder="<?= $t['bmi_h'] ?>" oninput="doBMI()">
        <div class="tool-result">
            <p>BMI: <b id="bmiVal">0</b></p>
            <p id="bmiText" style="font-weight:bold;">--</p>
        </div>
    </div>
</div>

<div id="pGeom" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['geom_title'] ?></h3>
    </div>

    <div class="tool-card" style="border: 1px solid #333; margin-top: 20px;">
        <h4 style="color: #fff; margin-bottom: 15px;">
            <i class="fas fa-vector-square"></i> <?= $t['rect_title'] ?>
        </h4>
        <div style="display: flex; gap: 10px;">
            <input type="number" id="sideA" class="main-input" placeholder="<?= $t['side_a'] ?>" oninput="calcGeom()">
            <input type="number" id="sideB" class="main-input" placeholder="<?= $t['side_b'] ?>" oninput="calcGeom()">
        </div>
        <div class="tool-result" style="margin-top: 15px; background: #111; border: 1px dashed #444;">
            <p><?= $t['res_area'] ?>: <b id="rectRes" style="color: #00ffcc; font-size: 20px;">0</b> m²</p>
            <p style="margin-top: 5px; border-top: 1px solid #222; padding-top: 5px;">
                <?= $t['res_perim'] ?>: <b id="perimRes" style="color: #00ffcc; font-size: 20px;">0</b> m
            </p>
        </div>
    </div>

    <div class="tool-card" style="border: 1px solid #333; margin-top: 20px;">
        <h4 style="color: #fff; margin-bottom: 15px;">
            <i class="fas fa-circle"></i> <?= $t['circle_title'] ?>
        </h4>
        <input type="number" id="radiusInput" class="main-input" placeholder="<?= $t['radius'] ?>" oninput="calcGeom()">
        <div class="tool-result" style="margin-top: 15px; background: #111; border: 1px dashed #444;">
            <p><?= $t['res_area'] ?>: <b id="circleRes" style="color: #00ffcc; font-size: 20px;">0</b> m²</p>
        </div>
    </div>
</div>

<div id="pVol" class="full-panel">
    <div class="panel-header"><i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> <h3><?= $t['vol'] ?></h3></div>
    <div class="tool-card">
        <input type="number" id="volIn" oninput="doVol()" class="main-input" placeholder="Litr">
        <div class="tool-result"><p>ml: <b id="v1">0</b></p><p>m³: <b id="v2">0</b></p></div>
    </div>
</div>

<div id="pFuel" class="full-panel">
    <div class="panel-header"><i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> <h3><?= $t['fuel'] ?></h3></div>
    <div class="tool-card">
        <input type="number" id="f1" class="main-input" placeholder="<?= $t['f_dist'] ?>" oninput="doFuel()">
        <div style="margin-top:10px;"></div>
        <input type="number" id="f2" class="main-input" placeholder="<?= $t['f_cons'] ?>" oninput="doFuel()">
        <div class="tool-result"><p>Litr: <b id="fRes">0</b></p></div>
    </div>
</div>

<div id="pPhys" class="full-panel">

    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['phys'] ?></h3>
    </div>

    <?php if($lang == 'uz'): ?>
    <div class="tool-card" style="border: 1px solid #00d4ff; box-shadow: 0 0 15px rgba(0,212,255,0.2); margin-top: 15px;">
        <h4 style="color: #00d4ff; text-align: center; margin-bottom: 15px;"><i class="fas fa-bolt"></i> <?= $t['phys_el_title'] ?></h4>
        <input type="number" id="wattInput" class="main-input" placeholder="<?= $t['watt_ph'] ?>">
        <input type="number" id="hoursInput" class="main-input" placeholder="<?= $t['hour_ph'] ?>">
        <input type="number" id="priceInput" class="main-input" placeholder="<?= $t['price_ph'] ?>">
        <button onclick="calcElectricity()" style="width: 100%; padding: 12px; background: linear-gradient(45deg, #00d4ff, #0055ff); color: #fff; border: none; border-radius: 8px; font-weight: bold; margin-top: 10px;"> Hisoblash </button>
        <div class="tool-result" style="background: rgba(0,212,255,0.1); border-left: 4px solid #00d4ff; margin-top: 15px; padding: 10px; border-radius: 5px;">
            <p><?= $t['month_res'] ?>: <b id="elecResult" style="color: #00d4ff;">0</b> so'm</p>
        </div>
    </div>
    <div style="text-align: center; margin: 15px 0; color: #555;">——— FORMULALAR ———</div>
    <?php endif; ?>

    <div class="tool-card" style="border: 1px solid #333; margin-bottom: 15px;">
        <h4 style="color: #2ecc71;"><i class="fas fa-tachometer-alt"></i> Tezlik (V = S / T)</h4>
        <div style="display: flex; gap: 10px;">
            <input type="number" id="distInput" class="main-input" placeholder="S (km)" oninput="calcSpeed()">
            <input type="number" id="timeInput" class="main-input" placeholder="T (h)" oninput="calcSpeed()">
        </div>
        <div class="tool-result" style="margin-top: 10px; text-align: center; border: 1px dashed #2ecc71;">
            <p>V: <b id="speedResult" style="color: #2ecc71; font-size: 20px;">0</b></p>
        </div>
    </div>

    <div class="tool-card" style="border: 1px solid #333; margin-bottom: 15px;">
        <h4 style="color: #e74c3c;"><i class="fas fa-cube"></i> <?= $t['dens_title'] ?></h4>
        <div style="display: flex; gap: 10px;">
            <input type="number" id="massInput" class="main-input" placeholder="<?= $t['mass_ph'] ?>" oninput="calcDensity()">
            <input type="number" id="volInput" class="main-input" placeholder="<?= $t['vol_ph'] ?>" oninput="calcDensity()">
        </div>
        <div class="tool-result" style="margin-top: 10px; text-align: center; border: 1px dashed #e74c3c;">
            <p>ρ: <b id="densResult" style="color: #e74c3c; font-size: 20px;">0</b></p>
        </div>
    </div>

    <div class="tool-card" style="border: 1px solid #333;">
        <h4 style="color: #f1c40f;"><i class="fas fa-dumbbell"></i> <?= $t['force_title'] ?></h4>
        <div style="display: flex; gap: 10px;">
            <input type="number" id="fMassInput" class="main-input" placeholder="<?= $t['mass_ph'] ?>" oninput="calcForce()">
            <input type="number" id="accInput" class="main-input" placeholder="<?= $t['acc_ph'] ?>" oninput="calcForce()">
        </div>
        <div class="tool-result" style="margin-top: 10px; text-align: center; border: 1px dashed #f1c40f;">
            <p>F: <b id="forceResult" style="color: #f1c40f; font-size: 20px;">0</b> N</p>
        </div>
    </div>

</div>

<div id="pHistory" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?php echo $t['hist']; ?></h3>
        <i class="fas fa-trash-alt" onclick="clearHistory()" 
           style="margin-left: auto; color: var(--danger); cursor: pointer;" 
           title="<?php echo $t['clear_hist'] ?? 'Clear'; ?>"></i>
    </div>
    <div id="historyList"></div>
</div>


<div id="pSettings" class="full-panel">
    <div class="panel-header">
        <i class="fas fa-arrow-left" onclick="openPanel('pMegaMenu')"></i> 
        <h3><?= $t['settings'] ?></h3>
    </div>
    <div class="tool-card">
        <?php 
        $langs = [
            'uz' => '🇺🇿 O\'zbekcha',
            'en' => '🇺🇸 English',
            'ru' => '🇷🇺 Русский',
            'tr' => '🇹🇷 Türkçe',
            'de' => '🇩🇪 Deutsch',
            'fr' => '🇫🇷 Français',
            'es' => '🇪🇸 Español',
            'it' => '🇮🇹 Italiano',
            'pt' => '🇵🇹 Português',
            'jp' => '🇯🇵 日本語',
            'cn' => '🇨🇳 中文',
            'ar' => '🇸🇦 العربية',
            'tj' => '🇹🇯 Тоҷикӣ',
            'kz' => '🇰🇿 Қазақша',
            'kr' => '🇰🇷 한국어'
        ];

        foreach($langs as $code => $name): 
            $isActive = ($lang == $code);
        ?>
            <a href="?lang=<?= $code ?>" class="lang-option" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; width: 100%;">
                <span><?= $name ?></span>
                <span id="check-<?= $code ?>"><?= $isActive ? '✅' : '' ?></span>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script>
    // 1. SOAT FUNKSIYASI
    function updateClock() {
        let now = new Date();
        let h = String(now.getHours()).padStart(2, '0');
        let m = String(now.getMinutes()).padStart(2, '0');
        let s = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('clockBox').innerText = h + ":" + m + ":" + s;
    }
    setInterval(updateClock, 1000);
    updateClock();

// 1. Hisoblash funksiyasi 
function calculateResult() {
    let s1 = parseFloat(document.getElementById('val1').value) || 0;
    let s2 = parseFloat(document.getElementById('val2').value) || 0;
    let amal = document.getElementById('opSelect').value;
    let res = 0;
    let op = "";

    // Mantiq
    if (amal == "plus") { res = s1 + s2; op = "+"; }
    else if (amal == "minus") { res = s1 - s2; op = "-"; }
    else if (amal == "kopaytir") { res = s1 * s2; op = "×"; }
    else if (amal == "bol") { res = (s2 != 0) ? (s1 / s2) : "Error"; op = "÷"; }
    else if (amal == "foiz") { res = (s1 * s2) / 100; op = "%"; }
    else if (amal == "kvadrat") { res = Math.pow(s1, 2); op = "x²"; }
    else if (amal == "kub") { res = Math.pow(s1, 3); op = "x³"; }
    else if (amal == "ildiz") { res = (s1 >= 0) ? Math.sqrt(s1) : "Error"; op = "√"; }
    else if (amal == "daraja") { res = Math.pow(s1, s2); op = "^"; }
    else if (amal == "sin") { res = Math.sin(s1 * Math.PI / 180); op = "sin"; }
    else if (amal == "cos") { res = Math.cos(s1 * Math.PI / 180); op = "cos"; }
    else if (amal == "tan") { res = Math.tan(s1 * Math.PI / 180); op = "tan"; }
    else if (amal == "fact") { 
        res = 1; for(let i=1; i<=s1; i++) res *= i;
        op = "n!";
    }

    let natija = isNaN(res) ? res : Number(res.toFixed(10));
    document.getElementById('liveDisplay').innerText = natija;

    // Tarixni saqlash
    if(res !== "Error") {
        let history = JSON.parse(localStorage.getItem('calc_history') || "[]");
        let h_text = s1 + " " + op + " " + (['plus','minus','kopaytir','bol','daraja'].includes(amal) ? s2 : "") + " = " + natija;
        history.unshift(h_text);
        localStorage.setItem('calc_history', JSON.stringify(history.slice(0, 20)));
        updateHistoryUI();
    }
}

//2. Tarixni yangilash funksiyasini bitta standartga keltiramiz
function updateHistoryUI() {
    let history = JSON.parse(localStorage.getItem('calc_history') || "[]");
    let listDiv = document.getElementById('historyList');
    if(!listDiv) return;

    if (history.length === 0) {
        listDiv.innerHTML = `<div style='text-align:center; padding:20px; opacity:0.5;'>${"<?= $t['empty_hist'] ?>"}</div>`;
        return;
    }

    listDiv.innerHTML = history.map(h => `<div class='tool-card'>${h}</div>`).join('');
}

window.addEventListener('load', () => {
    syncRates();
    updateHistoryUI();
    updateClock();
});

// 3. Valyutani internetdan olish va keshga saqlash
async function syncRates() {
    try {
        const response = await fetch("https://cbu.uz/uz/arkhiv-kursov-valyut/json/");
        const data = await response.json();
        localStorage.setItem('valyuta_kesh', JSON.stringify(data));
        fillRates(data);
    } catch (e) {
        let cached = localStorage.getItem('valyuta_kesh');
        if(cached) fillRates(JSON.parse(cached));
    }
}
function fillRates(data) {
    const sumText = "<?php echo isset($t['sum']) ? $t['sum'] : 'So\'m'; ?>";
    
    let options = `<option value="1">UZS - ${sumText}</option>`;
    
    data.forEach(i => {
        options += `<option value="${i.Rate}">${i.Ccy}</option>`;
    });
    
    const fromEl = document.getElementById('curFrom');
    const toEl = document.getElementById('curTo');
    
    if (fromEl && toEl) {
        fromEl.innerHTML = options;
        toEl.innerHTML = options;
    }
}

// Sahifa yuklanganda ishlash
window.addEventListener('load', () => {
    syncRates();
    updateHistoryUI();
});
    // 2. KALKULYATOR KIRITISH LOGIKASI
    let activeField = 'val1';
    document.getElementById('val1').onclick = () => activeField = 'val1';
    document.getElementById('val2').onclick = () => activeField = 'val2';

    function addNum(v) { document.getElementById(activeField).value += v; }
    function deleteChar() { let el = document.getElementById(activeField); el.value = el.value.slice(0, -1); }
    function resetAll() { document.getElementById('val1').value = ''; document.getElementById('val2').value = ''; document.getElementById('liveDisplay').innerText = '0'; }
    function switchField() { activeField = (activeField === 'val1' ? 'val2' : 'val1'); }
    function setFastOp(op) { document.getElementById('opSelect').value = op; activeField = 'val2'; }

    function toggleTheme() {
        document.body.classList.toggle('light-mode');
        document.cookie = "theme=" + (document.body.classList.contains('light-mode') ? 'light' : 'dark') + ";path=/";
    }

    // 4. MODULLAR HISOB-KITOBLARI
    function doCurrency() {
        let amt = document.getElementById('curAmount').value || 0;
        let from = document.getElementById('curFrom').value;
        let to = document.getElementById('curTo').value;
        document.getElementById('curResult').innerText = ((amt * from) / to).toLocaleString(undefined, {minimumFractionDigits: 2});
    }

   function calcGeom() {
    // To'rtburchak: Yuza va Perimetr
    let a = parseFloat(document.getElementById('sideA').value) || 0;
    let b = parseFloat(document.getElementById('sideB').value) || 0;
    
    document.getElementById('rectRes').innerText = (a * b).toFixed(2);
    document.getElementById('perimRes').innerText = (2 * (a + b)).toFixed(2);

    // Aylana hisobi
    let r = parseFloat(document.getElementById('radiusInput').value) || 0;
    if (r > 0) {
        let s = Math.PI * Math.pow(r, 2);
        document.getElementById('circleRes').innerText = s.toFixed(2);
    } else {
        document.getElementById('circleRes').innerText = "0";
    }
}

    function doVol() {
        let l = parseFloat(document.getElementById('volIn').value) || 0;
        document.getElementById('v1').innerText = (l * 1000).toLocaleString();
        document.getElementById('v2').innerText = (l / 1000).toFixed(4);
    }

    function doMass() {
    let kg = parseFloat(document.getElementById('mIn').value) || 0;
    
    document.getElementById('m_gr').innerText = (kg * 1000).toLocaleString();
    document.getElementById('m_sn').innerText = (kg / 100).toFixed(4);
    document.getElementById('m_tn').innerText = (kg / 1000).toFixed(4);
    document.getElementById('m_lb').innerText = (kg * 2.20462).toFixed(2);
}

// BMI Hisoblash
function doBMI() {
    let w = parseFloat(document.getElementById('healthW').value) || 0;
    let h = parseFloat(document.getElementById('healthH').value) / 100; 
    let res = document.getElementById('bmiVal');
    let txt = document.getElementById('bmiText');

    if (w > 0 && h > 0) {
        let bmi = w / (h * h);
        res.innerText = bmi.toFixed(1);

        if (bmi < 18.5) { txt.innerText = "<?= $t['bmi_thin'] ?>"; txt.style.color = "#3498db"; }
        else if (bmi < 25) { txt.innerText = "<?= $t['bmi_normal'] ?>"; txt.style.color = "#2ecc71"; }
        else if (bmi < 30) { txt.innerText = "<?= $t['bmi_over'] ?>"; txt.style.color = "#f1c40f"; }
        else { txt.innerText = "<?= $t['bmi_obese'] ?>"; txt.style.color = "#e74c3c"; }
    }
}

function openPanel(panelId) {
    // 1. Avval hamma panellarni yopib, tozalaymiz
    const allPanels = document.querySelectorAll('.full-panel');
    allPanels.forEach(p => {
        p.classList.remove('active');
        p.style.display = 'none';
    });

    // 2. Kerakli panelni ochamiz
    const targetPanel = document.getElementById(panelId);
    if (targetPanel) {
        targetPanel.style.display = 'block';
        // Ozgina kechikish bilan klass qo'shish (animatsiya yaxshi chiqishi uchun)
        setTimeout(() => {
            targetPanel.classList.add('active');
        }, 10);
        targetPanel.style.zIndex = '10000';
        document.body.style.overflow = 'hidden'; 
    } else {
        console.error("Xato: " + panelId + " IDli panel topilmadi!");
    }
}

// Barcha panellarni yopish funksiyasi
function closeAllPanels() {
    const allPanels = document.querySelectorAll('.full-panel');
    allPanels.forEach(p => {
        p.classList.remove('active');
        p.style.display = 'none';
    });
    document.body.style.overflow = 'auto';
}

// Kredit panelidan chiqish (Maxsus)
function closeLoanPanel() {
    closeAllPanels(); // Avval hammasini yopamiz
    // Mega menyuni qayta ochamiz
    openPanel('pMegaMenu');
}

function updateLoanDefaults() {
    const cat = document.getElementById('loanCategory').value;
    if(cat === 'avto') {
        document.getElementById('loanRate').value = 24;
        document.getElementById('loanTerm').value = 48;
    } else if(cat === 'ipoteka') {
        document.getElementById('loanRate').value = 18;
        document.getElementById('loanTerm').value = 240;
    } else {
        document.getElementById('loanRate').value = 28;
        document.getElementById('loanTerm').value = 12;
    }
}

function calculateUzLoan() {
    let total = parseFloat(document.getElementById('loanSum').value) || 0;
    let down = parseFloat(document.getElementById('downPayment').value) || 0;
    let rate = parseFloat(document.getElementById('loanRate').value) || 0;
    let term = parseInt(document.getElementById('loanTerm').value) || 0;

    let loanAmount = total - down;

    if (loanAmount <= 0 && total > 0) {
        alert("Boshlang'ich to'lov umumiy summadan kichik bo'lishi kerak!");
        return;
    }

    let mRate = (rate / 100) / 12;
    let monthly = loanAmount * mRate / (1 - Math.pow(1 + mRate, -term));
    let totalPay = monthly * term;

    document.getElementById('resPureLoan').innerText = Math.round(loanAmount).toLocaleString();
    document.getElementById('resMonthly').innerText = Math.round(monthly).toLocaleString();
    document.getElementById('resTotal').innerText = Math.round(totalPay).toLocaleString();
    document.getElementById('loanResult').style.display = 'block';
}

// ALIMENT HISOBLASH FUNKSIYASI
function calculateAliment() {
    let salary = parseFloat(document.getElementById('salary_input').value) || 0;
    let percent = parseFloat(document.getElementById('child_count').value);
    
    if (salary <= 0) {
        alert("Iltimos, ish haqini kiriting!");
        return;
    }

    let alimentSum = salary * percent;

    document.getElementById('res_sum').innerText = Math.round(alimentSum).toLocaleString();
    document.getElementById('alimentResult').style.display = 'block';
}

// Elektr energiyasi sarfi
function calcElectricity() {
    let w = parseFloat(document.getElementById('wattInput').value) || 0;
    let h = parseFloat(document.getElementById('hoursInput').value) || 0;
    let p = parseFloat(document.getElementById('priceInput').value) || 0;
    
    if (w > 0 && h > 0 && p > 0) {
        let res = Math.round((w * h * 30 / 1000) * p);
        document.getElementById('elecResult').innerText = res.toLocaleString('ru-RU');
    }
}

function calcSpeed() {
    let s = document.getElementById('distInput').value;
    let t = document.getElementById('timeInput').value;
    document.getElementById('speedResult').innerText = (s > 0 && t > 0) ? (s / t).toFixed(2) : "0";
}

function calcDensity() {
    let m = document.getElementById('massInput').value;
    let v = document.getElementById('volInput').value;
    document.getElementById('densResult').innerText = (m > 0 && v > 0) ? (m / v).toFixed(2) : "0";
}

function calcForce() {
    let m = document.getElementById('fMassInput').value;
    let a = document.getElementById('accInput').value;
    document.getElementById('forceResult').innerText = (m > 0 && a > 0) ? (m * a).toFixed(2) : "0";
}

// Masofa funksiyasi - To'liq ishlashi uchun
function doDist() {
    let kmInput = document.getElementById('dIn');
    if(!kmInput) return;

    let km = parseFloat(kmInput.value) || 0;
    
    // IDlar HTML bilan bir xil: d_cm, d_m, d_mi, d_ft
    document.getElementById('d_cm').innerText = (km * 100000).toLocaleString();
    document.getElementById('d_m').innerText  = (km * 1000).toLocaleString();
    document.getElementById('d_mi').innerText = (km * 0.621371).toFixed(4);
    document.getElementById('d_ft').innerText = (km * 3280.84).toFixed(2);
}

    function doTime() {
    let h = parseFloat(document.getElementById('tIn').value) || 0;
    
    document.getElementById('t_s').innerText = (h * 3600).toLocaleString(); // Sekund
    document.getElementById('t_m').innerText = (h * 60).toLocaleString();   // Minut
    document.getElementById('t_d').innerText = (h / 24).toFixed(2);         // Kun
    document.getElementById('t_w').innerText = (h / 168).toFixed(2);        // Hafta
    document.getElementById('t_mo').innerText = (h / 730).toFixed(2);       // Oy (o'rtacha)
    document.getElementById('t_y').innerText = (h / 8760).toFixed(4);       // Yil
}

    function doFuel() {
        let d = document.getElementById('f1').value;
        let s = document.getElementById('f2').value;
        if(d && s) document.getElementById('fRes').innerText = ((d * s) / 100).toFixed(2);
    }

   
    function clearHistory() {
    if (confirm("<?= $t['clear_hist'] ?>")) {
        localStorage.removeItem('calc_history');
        updateHistoryUI(); 
    }
}

function updateHistoryUI() {
    let history = JSON.parse(localStorage.getItem('calc_history') || "[]");
    let listDiv = document.getElementById('historyList');
    
    if (history.length === 0) {
        listDiv.innerHTML = "<div style='text-align:center; padding:20px; opacity:0.5;'><?= $t['empty_hist'] ?></div>";
        return;
    }

    listDiv.innerHTML = history.map(h => `<div class='tool-card'>${h}</div>`).join('');
}

    let html = "";
    history.forEach(h => {
        html += `<div class='tool-card'>${h}</div>`;
    });
    listDiv.innerHTML = html;

</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7DWZ9N8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</body>
</html>