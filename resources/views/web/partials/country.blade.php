  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

   <select required aria-required="true" name="country" class="form-control" >
    <option value="0">{{ __('Country of residence') }}</option>
    <option value="AF" @if (old('country') == "AF") {{ 'selected' }} @endif>
      {{ __("Afghanistan") }}
    </option>
    <option value="AL" @if (old('country') == "AL") {{ 'selected' }} @endif>
      {{ __("Albania") }}
    </option>
    <option value="DE" @if (old('country') == "DE") {{ 'selected' }} @endif>
      {{ __("Germany") }}
    </option>
    <option value="AD" @if (old('country') == "AD") {{ 'selected' }} @endif>
      {{ __("Andorra") }}
    </option>
    <option value="AO" @if (old('country') == "AO") {{ 'selected' }} @endif>
      {{ __("Angola") }}
    </option>
    <option value="AI" @if (old('country') == "AI") {{ 'selected' }} @endif>
      {{ __("Anguilla") }}
    </option>
    <option value="AQ" @if (old('country') == "AQ") {{ 'selected' }} @endif>
      {{ __("Antarctica") }}
    </option>
    <option value="AG" @if (old('country') == "AG") {{ 'selected' }} @endif>
      {{ __("Antigua and Barbuda") }}
    </option>
    <option value="AN" @if (old('country') == "AN") {{ 'selected' }} @endif>
      {{ __("Netherlands Antilles") }}
    </option>
    <option value="SA" @if (old('country') == "SA") {{ 'selected' }} @endif>
      {{ __("Saudi Arabia") }}
    </option>
    <option value="DZ" @if (old('country') == "DZ") {{ 'selected' }} @endif>
      {{ __("Algeria") }}
    </option>
    <option value="Argentina" @if (old('country') == "Argentina") {{ 'selected' }} @endif>
      {{ __("Argentina") }}
    </option>
    <option value="AM" @if (old('country') == "AM") {{ 'selected' }} @endif>
      {{ __("Armenia") }}
    </option>
    <option value="AW" @if (old('country') == "AW") {{ 'selected' }} @endif>
      {{ __("Aruba") }}
    </option>
    <option value="AU" @if (old('country') == "AU") {{ 'selected' }} @endif>
      {{ __("Australia") }}
    </option>
    <option value="AT" @if (old('country') == "AT") {{ 'selected' }} @endif>
      {{ __("Austria") }}
    </option>
    <option value="AZ" @if (old('country') == "AZ") {{ 'selected' }} @endif>
      {{ __("Azerbaijan") }}
    </option>
    <option value="BS" @if (old('country') == "BS") {{ 'selected' }} @endif>
      {{ __("Bahamas") }}
    </option>
    <option value="BH" @if (old('country') == "BH") {{ 'selected' }} @endif>
      {{ __("Bahrain") }}
    </option>
    <option value="BD" @if (old('country') == "BD") {{ 'selected' }} @endif>
      {{ __("Bangladesh") }}
    </option>
    <option value="BB" @if (old('country') == "BB") {{ 'selected' }} @endif>
      {{ __("Barbados") }}
    </option>
    <option value="BE" @if (old('country') == "BE") {{ 'selected' }} @endif>
       {{ __("Belgium") }}
    </option>
    <option value="BZ" @if (old('country') == "BZ") {{ 'selected' }} @endif>
      {{ __("Belize") }}
    </option>
    <option value="BJ" @if (old('country') == "BJ") {{ 'selected' }} @endif>
      {{ __("Benin") }}
    </option>
    <option value="BM" @if (old('country') == "BM") {{ 'selected' }} @endif>
      {{ __("Bermuda") }}
    </option>
    <option value="BY" @if (old('country') == "BY") {{ 'selected' }} @endif>
       {{ __("Belarus") }}
    </option>
    <option value="MM" @if (old('country') == "MM") {{ 'selected' }} @endif>
      {{ __("Birmania") }}
    </option>
    <option value="Bolivia" @if (old('country') == "Bolivia") {{ 'selected' }} @endif>
      {{ __("Bolivia") }}
    </option>
    <option value="BA" @if (old('country') == "BA") {{ 'selected' }} @endif>
      {{ __("Bosnia-Herzegovina") }}
    </option>
    <option value="BW" @if (old('country') == "BW") {{ 'selected' }} @endif>
      {{ __("Botswana") }}
    </option>
    <option value="Brasil" @if (old('country') == "Brasil") {{ 'selected' }} @endif>
      {{ __("Brazil") }}
    </option>
    <option value="BN" @if (old('country') == "BN") {{ 'selected' }} @endif>
      {{ __("Brunei Darussalam") }}
    </option>
    <option value="BG" @if (old('country') == "BG") {{ 'selected' }} @endif>
      {{ __("Bulgaria") }}
    </option>
    <option value="BF" @if (old('country') == "BF") {{ 'selected' }} @endif>
      {{ __("Burkina
      Faso") }}
    </option>
    <option value="BI" @if (old('country') == "BI") {{ 'selected' }} @endif>
      {{ __('Burundi') }}
    </option>
    <option value="BT" @if (old('country') == "BT") {{ 'selected' }} @endif>
      Bhutan
    </option>
    <option value="CV" @if (old('country') == "CV") {{ 'selected' }} @endif>
      {{ __("Cape Verde") }}
    </option>
    <option value="KH" @if (old('country') == "KH") {{ 'selected' }} @endif>
      {{ __("Cambodia") }}
    </option>
    <option value="CM" @if (old('country') == "CM") {{ 'selected' }} @endif>
      {{ __("Cameroon") }}
    </option>
    <option value="Canadá" @if (old('country') == "Canadá") {{ 'selected' }} @endif>
      {{ __("Canada") }}
    </option>
    <option value="TD" @if (old('country') == "TD") {{ 'selected' }} @endif>
      {{ __("Chad") }}
    </option>
    <option value="Chile" @if (old('country') == "Chile") {{ 'selected' }} @endif>
      {{ __("Chile") }}
    </option>
    <option value="CN" @if (old('country') == "CN") {{ 'selected' }} @endif>
      {{ __("China") }}
    </option>
    <option value="CY" @if (old('country') == "CY") {{ 'selected' }} @endif>
      {{ __("Cyprus") }}
    </option>
    <option value="VA" @if (old('country') == "VA") {{ 'selected' }} @endif>
      {{ __("Vatican City State") }}
    </option>
    <option value="Colombia" @if (old('country') == "Colombia") {{ 'selected' }} @endif>
      {{ __("Colombia") }}
    </option>
    <option value="KM" @if (old('country') == "KM") {{ 'selected' }} @endif>
      {{ __("Comoros") }}
    </option>
    <option value="CG"@if (old('country') == "CG") {{ 'selected' }} @endif>
      {{ __("Congo") }}
    </option>

    <option value="KR" @if (old('country') == "KO") {{ 'selected' }} @endif>
      {{ __("Korea") }}
    </option>
    <option value="KP" @if (old('country') == "KP") {{ 'selected' }} @endif>
     {{ __("Korea (North)") }}
    </option>
    <option value="CI" @if (old('country') == "CI") {{ 'selected' }} @endif>
      {{ __("Ivory Coast, Côte d'Ivoire") }}
    </option>
    <option value="Costa Rica" @if (old('country') == "CR") {{ 'selected' }} @endif>
      {{ __("Costa Rica") }}
    </option>
    <option value="HR" @if (old('country') == "HR") {{ 'selected' }} @endif>
     {{ __("Croatia") }}
    </option>
    <option value="Cuba" @if (old('country') == "Cuba") {{ 'selected' }} @endif>
      {{ __("Cuba") }}
    </option>
    <option value="DK" @if (old('country') == "DK") {{ 'selected' }} @endif>
      {{ __("Denmark") }}
    </option>

    <option value="DM" @if (old('country') == "DM") {{ 'selected' }} @endif>
      {{ __("Dominica") }}
    </option>
    <option value="Ecuador" @if (old('country') == "Ecuador") {{ 'selected' }} @endif>
      {{ __("Ecuador") }}
    </option>
    <option value="EG" @if (old('country') == "EG") {{ 'selected' }} @endif>
      {{ __("Egypt") }}
    </option>
    <option value="El Salvador" @if (old('country') == "El Salvador") {{ 'selected' }} @endif>
      {{ __("El Salvador") }}
    </option>
    <option value="AE" @if (old('country') == "AE") {{ 'selected' }} @endif>
      {{ __("United Arab Emirates") }}
    </option>
    <option value="ER" @if (old('country') == "ER") {{ 'selected' }} @endif>
      {{ __("Eritrea") }}
    </option>
    <option value="SI" @if (old('country') == "SI") {{ 'selected' }} @endif>
      {{ __("Slovenia") }}
    </option>
    <option value="España" @if (old('country') == "España") {{ 'selected' }} @endif>
      {{ __("Spain") }}
    </option>
    <option value="USA" @if (old('country') == "USA") {{ 'selected' }} @endif>
     {{ __("USA") }}
    </option>
    <option value="EE" @if (old('country') == "EE") {{ 'selected' }} @endif>
      {{ __("Estonia") }}
    </option>
    <option value="ET" @if (old('country') == "ET") {{ 'selected' }} @endif>
      {{ __("Ethiopia") }}
    </option>
    <option value="FJ" @if (old('country') == "FJ") {{ 'selected' }} @endif>
     {{ __(" Fiji") }}
    </option>
    <option value="PH" @if (old('country') == "PH") {{ 'selected' }} @endif>
      {{ __("Philippines") }}
    </option>
    <option value="FI" @if (old('country') == "FI") {{ 'selected' }} @endif>
      {{ __("Finland") }}
    </option>
    <option value="Francia" @if (old('country') == "Francia") {{ 'selected' }} @endif>
      {{ __("France") }}
    </option>
    <option value="GA" @if (old('country') == "GA") {{ 'selected' }} @endif>
      {{ __("Gabon") }}
    </option>
    <option value="GM" @if (old('country') == "GM") {{ 'selected' }} @endif>
      {{ __("Gambia") }}
    </option>
    <option value="GE" @if (old('country') == "GE") {{ 'selected' }} @endif>
      {{ __("Georgia") }}
    </option>
    <option value="GH" @if (old('country') == "GH") {{ 'selected' }} @endif>
      {{ __("Ghana") }}
    </option>
    <option value="GI" @if (old('country') == "GI") {{ 'selected' }} @endif>
      {{ __("Gibraltar") }}
    </option>
    <option value="GD" @if (old('country') == "GD") {{ 'selected' }} @endif>
      {{ __("Granada") }}
    </option>
    <option value="GR" @if (old('country') == "GR") {{ 'selected' }} @endif>
      {{ __("Greece") }}
    </option>
    <option value="GL" @if (old('country') == "GL") {{ 'selected' }} @endif>
      {{ __("Greenland") }}
    </option>
    <option value="Guadalupe" @if (old('country') == "Guadalupe") {{ 'selected' }} @endif>
      {{ __("Guadalupe") }}
    </option>
    <option value="GU" @if (old('country') == "GU") {{ 'selected' }} @endif>
      {{ __("Guam") }}
    </option>
    <option value="Guatemala" @if (old('country') == "Guatemala") {{ 'selected' }} @endif>
      {{ __("Guatemala") }}
    </option>
    <option value="GY" @if (old('country') == "GY") {{ 'selected' }} @endif>
      {{ __("Guiana") }}
    </option>
    <option value="GF" @if (old('country') == "GF") {{ 'selected' }} @endif>
      {{ __("French Guiana") }}
    </option>
    <option value="GN" @if (old('country') == "GN") {{ 'selected' }} @endif>
      {{ __("Guinea") }}
    </option>
    <option value="GQ" @if (old('country') == "GQ") {{ 'selected' }} @endif>
      {{ __("Equatorial Guinea") }}
    </option>
    <option value="GW" @if (old('country') == "GW") {{ 'selected' }} @endif>
      {{ __("Guinea-Bissau") }}
    </option>
    <option value="Haití" @if (old('country') == "Haití") {{ 'selected' }} @endif>
      {{ __("Haiti") }}
    </option>
    <option value="Honduras" @if (old('country') == "Honduras") {{ 'selected' }} @endif>
      {{ __("Honduras") }}
    </option>
    <option value="HU" @if (old('country') == "HU") {{ 'selected' }} @endif>
      {{ __("Hungary") }}
    </option>
    <option value="IN" @if (old('country') == "IN") {{ 'selected' }} @endif>
      {{ __("India") }}
    </option>
    <option value="ID" @if (old('country') == "ID") {{ 'selected' }} @endif>
      {{ __("Indonesia") }}
    </option>
    <option value="IQ" @if (old('country') == "IQ") {{ 'selected' }} @endif>
      {{ __("Irak") }}
    </option>
    <option value="IR" @if (old('country') == "IR") {{ 'selected' }} @endif>
      {{ __("Irán") }}
    </option>
    <option value="Irlanda" @if (old('country') == "Irlanda") {{ 'selected' }} @endif>
      {{ __("Ireland") }}
    </option>

    <option value="IS" @if (old('country') == "IS") {{ 'selected' }} @endif>
      {{ __("Iceland") }}
    </option>
    <option value="KY" @if (old('country') == "KY") {{ 'selected' }} @endif>
     {{ __("Cayman Islands") }}
    </option>
    <option value="CK" @if (old('country') == "CK") {{ 'selected' }} @endif>
      {{ __("Cook Islands") }}
    </option>

    <option value="FO" @if (old('country') == "FO") {{ 'selected' }} @endif>
      {{ __("Faroe Islands") }}
    </option>
    <option value="HM" @if (old('country') == "HM") {{ 'selected' }} @endif>
      {{ __("Heard Island and McDonald Islands") }}
    </option>
    <option value="FK" @if (old('country') == "FK") {{ 'selected' }} @endif>
      {{ __("Falkland Islands") }}
    </option>
    <option value="MP" @if (old('country') == "MP") {{ 'selected' }} @endif>
      {{ __("Northern Mariana Islands") }}
    </option>
    <option value="MH" @if (old('country') == "MH") {{ 'selected' }} @endif>
       {{ __("Marshall Islands") }}
    </option>

    <option value="PW" @if (old('country') == "PW") {{ 'selected' }} @endif>
     {{ __("Islands Palau") }}
    </option>
    <option value="SB" @if (old('country') == "SB") {{ 'selected' }} @endif>
     {{ __('Solomon Islands') }}
    </option>
    <option value="SJ" @if (old('country') == "SJ") {{ 'selected' }} @endif>
     {{ __("Svalbard and Jan Mayen Islands") }}
    </option>
    <option value="TC" @if (old('country') == "TC") {{ 'selected' }} @endif>
      {{ __("Turks and Caicos Islands") }}
    </option>
    <option value="VI" @if (old('country') == "VI") {{ 'selected' }} @endif>
   {{ __("US Virgin Islands") }}
    </option>
    <option value="VG" @if (old('country') == "VG") {{ 'selected' }} @endif>
      {{ __("British Virgin Islands") }}
    </option>

    <option value="IL" @if (old('country') == "IL") {{ 'selected' }} @endif>
      {{ __("Israel") }}
    </option>
    <option value="Italia" @if (old('country') == "Italia") {{ 'selected' }} @endif>
      {{ __("Italy") }}
    </option>
    <option value="Jamaica" @if (old('country') == "Jamaica") {{ 'selected' }} @endif>
      {{ __("Jamaica") }}
    </option>
    <option value="JP" @if (old('country') == "JP") {{ 'selected' }} @endif>
      {{ __("Japan") }}
    </option>
    <option value="JO" @if (old('country') == "JO") {{ 'selected' }} @endif>
      {{ __("Jordan") }}
    </option>
    <option value="KZ" @if (old('country') == "KZ") {{ 'selected' }} @endif>
       {{ __("Kazakhstan") }}
    </option>
    <option value="KE" @if (old('country') == "KE") {{ 'selected' }} @endif>
      {{ __("Kenya") }}
    </option>
    <option value="KG" @if (old('country') == "KG") {{ 'selected' }} @endif>
      {{ __("Kyrgyzstan") }}
    </option>
    <option value="KI" @if (old('country') == "KI") {{ 'selected' }} @endif>
      {{ __("Kiribati") }}
    </option>
    <option value="KW" @if (old('country') == "KW") {{ 'selected' }} @endif>
      {{ __("Kuwait") }}
    </option>
    <option value="LA" @if (old('country') == "LA") {{ 'selected' }} @endif>
      {{ __("Laos") }}
    </option>
    <option value="LS" @if (old('country') == "LS") {{ 'selected' }} @endif>
      {{ __("Lesotho") }}
    </option>
    <option value="LV" @if (old('country') == "LV") {{ 'selected' }} @endif>
      {{ __("Latvia") }}
    </option>
    <option value="LB" @if (old('country') == "LB") {{ 'selected' }} @endif>
      {{ __("Lebanon") }}
    </option>
    <option value="LR" @if (old('country') == "LR") {{ 'selected' }} @endif>
      {{ __("Liberia") }}
    </option>
    <option value="LY" @if (old('country') == "LY") {{ 'selected' }} @endif>
      {{ __("Libya") }}
    </option>
    <option value="LI" @if (old('country') == "LI") {{ 'selected' }} @endif>
      {{ __("Liechtenstein") }}
    </option>
    <option value="LT" @if (old('country') == "LT") {{ 'selected' }} @endif>
      {{ __("Lithuania") }}
    </option>
    <option value="LU" @if (old('country') == "LU") {{ 'selected' }} @endif>
      {{ __("Luxembourg") }}
    </option>
    <option value="MK" @if (old('country') == "MK") {{ 'selected' }} @endif>
      {{ __("Macedonia") }}
    </option>
    <option value="MG" @if (old('country') == "MG") {{ 'selected' }} @endif>
      {{ __("Madagascar") }}
    </option>
    <option value="MY" @if (old('country') == "MY") {{ 'selected' }} @endif>
      {{ __("Malaysia") }}
    </option>
    <option value="MW" @if (old('country') == "MW") {{ 'selected' }} @endif>
      {{ __("Malawi") }}
    </option>
    <option value="MV" @if (old('country') == "MV") {{ 'selected' }} @endif>
      {{ __("Maldives") }}
    </option>
    <option value="ML" @if (old('country') == "ML") {{ 'selected' }} @endif>
      {{ __("Mali") }}
    </option>
    <option value="MT" @if (old('country') == "MT") {{ 'selected' }} @endif>
      {{ __("Malta") }}
    </option>
    <option value="MA" @if (old('country') == "MA") {{ 'selected' }} @endif>
      {{ __("Morocco") }}
    </option>
    <option value="MQ" @if (old('country') == "MQ") {{ 'selected' }} @endif>
      {{ __("Martinique") }}
    </option>
    <option value="MU" @if (old('country') == "MU") {{ 'selected' }} @endif>
      Mauricio
    </option>
    <option value="MR" @if (old('country') == "MR") {{ 'selected' }} @endif>
      Mauritania
    </option>
    <option value="YT" @if (old('country') == "YT") {{ 'selected' }} @endif>
      Mayotte
    </option>
    <option value="México" @if (old('country') == "México") {{ 'selected' }} @endif>
      México
    </option>
    <option value="FM" @if (old('country') == "FM") {{ 'selected' }} @endif>
      Micronesia
    </option>
    <option value="MD" @if (old('country') == "MD") {{ 'selected' }} @endif>
      Moldavia
    </option>
    <option value="MC" @if (old('country') == "MC") {{ 'selected' }} @endif>
      Mónaco
    </option>
    <option value="MN" @if (old('country') == "MN") {{ 'selected' }} @endif>
      Mongolia
    </option>
    <option value="MS" @if (old('country') == "MS") {{ 'selected' }} @endif>
      Montserrat
    </option>
    <option value="MZ" @if (old('country') == "MZ") {{ 'selected' }} @endif>
      Mozambique
    </option>
    <option value="NA" @if (old('country') == "NA") {{ 'selected' }} @endif>
      Namibia
    </option>
    <option value="NR" @if (old('country') == "NR") {{ 'selected' }} @endif>
      Nauru
    </option>
    <option value="NP" @if (old('country') == "NP") {{ 'selected' }} @endif>
      Nepal
    </option>
    <option value="Nicaragua" @if (old('country') == "Nicaragua") {{ 'selected' }} @endif>
      Nicaragua
    </option>
    <option value="NE" @if (old('country') == "NE") {{ 'selected' }} @endif>
      Níger
    </option>
    <option value="NG" @if (old('country') == "NG") {{ 'selected' }} @endif>
      Nigeria
    </option>
    <option value="NU" @if (old('country') == "NU") {{ 'selected' }} @endif>
      Niue
    </option>
    <option value="NF" @if (old('country') == "NF") {{ 'selected' }} @endif>
      Norfolk
    </option>
    <option value="NO" @if (old('country') == "NO") {{ 'selected' }} @endif>
      Noruega
    </option>
    <option value="NC" @if (old('country') == "NC") {{ 'selected' }} @endif>
      Nueva
      Caledonia
    </option>
    <option value="NZ" @if (old('country') == "NZ") {{ 'selected' }} @endif>
      Nueva
      Zelanda
    </option>
    <option value="OM" @if (old('country') == "OM") {{ 'selected' }} @endif>
      Omán
    </option>
    <option value="NL" @if (old('country') == "NL") {{ 'selected' }} @endif>
      Países
      Bajos
    </option>
    <option value="Panamá" @if (old('country') == "Panamá") {{ 'selected' }} @endif>
      Panamá
    </option>
    <option value="PG" @if (old('country') == "PG") {{ 'selected' }} @endif>
      Papúa
      Nueva Guinea
    </option>
    <option value="PK" @if (old('country') == "PK") {{ 'selected' }} @endif>
      Paquistán
    </option>
    <option value="Paraguay" @if (old('country') == "Paraguay") {{ 'selected' }} @endif>
      Paraguay
    </option>
    <option value="Perú" @if (old('country') == "Perú") {{ 'selected' }} @endif>
      Perú
    </option>
    <option value="PN" @if (old('country') == "PN") {{ 'selected' }} @endif>
      Pitcairn
    </option>
    <option value="PF" @if (old('country') == "PF") {{ 'selected' }} @endif>
      Polinesia Francesa
    </option>
    <option value="PL" @if (old('country') == "PL") {{ 'selected' }} @endif>
      Polonia
    </option>
    <option value="Portugal" @if (old('country') == "Portugal") {{ 'selected' }} @endif>
      Portugal
    </option>
    <option value="PR" @if (old('country') == "PR") {{ 'selected' }} @endif>
      Puerto
      Rico
    </option>
    <option value="QA" @if (old('country') == "QA") {{ 'selected' }} @endif>
      Qatar
    </option>
    <option value="UK" @if (old('country') == "UK") {{ 'selected' }} @endif>
      Reino
      Unido
    </option>
    <option value="CF" @if (old('country') == "CF") {{ 'selected' }} @endif>
      República Centroafricana
    </option>
    <option value="CZ" @if (old('country') == "CZ") {{ 'selected' }} @endif>
      República Checa
    </option>
    <option value="ZA" @if (old('country') == "ZA") {{ 'selected' }} @endif>
      República de Sudáfrica
    </option>
    <option value="República Dominicana" @if (old('country') == "República Dominicana") {{ 'selected' }} @endif>
      República Dominicana
    </option>
    <option value="SK" @if (old('country') == "SK") {{ 'selected' }} @endif>
      República Eslovaca
    </option>
    <option value="RE" @if (old('country') == "RE") {{ 'selected' }} @endif>
      Reunión
    </option>
    <option value="RW" @if (old('country') == "RW") {{ 'selected' }} @endif>
      Ruanda
    </option>
    <option value="RO" @if (old('country') == "RO") {{ 'selected' }} @endif>
      Rumania
    </option>
    <option value="RU" @if (old('country') == "RU") {{ 'selected' }} @endif>
      Rusia
    </option>
    <option value="EH" @if (old('country') == "EH") {{ 'selected' }} @endif>
      Sahara
      Occidental
    </option>
    <option value="KN" @if (old('country') == "KN") {{ 'selected' }} @endif>
      Saint
      Kitts y Nevis
    </option>
    <option value="WS" @if (old('country') == "WS") {{ 'selected' }} @endif>
      Samoa
    </option>
    <option value="AS" @if (old('country') == "AS") {{ 'selected' }} @endif>
      Samoa
      Americana
    </option>
    <option value="SM" @if (old('country') == "SM") {{ 'selected' }} @endif>
      San
      Marino
    </option>
    <option value="VC" @if (old('country') == "VC") {{ 'selected' }} @endif>
      San
      Vicente y Granadinas
    </option>
    <option value="SH" @if (old('country') == "SH") {{ 'selected' }} @endif>
      Santa
      Helena
    </option>
    <option value="LC" @if (old('country') == "LC") {{ 'selected' }} @endif>
      Santa
      Lucía
    </option>
    <option value="ST" @if (old('country') == "ST") {{ 'selected' }} @endif>
      Santo
      Tomé y Príncipe
    </option>
    <option value="SN" @if (old('country') == "SN") {{ 'selected' }} @endif>
      Senegal
    </option>
    <option value="SC" @if (old('country') == "SC") {{ 'selected' }} @endif>
      Seychelles
    </option>
    <option value="SL" @if (old('country') == "SL") {{ 'selected' }} @endif>
      Sierra
      Leona
    </option>
    <option value="SG" @if (old('country') == "SG") {{ 'selected' }} @endif>
      Singapur
    </option>
    <option value="SY" @if (old('country') == "SY") {{ 'selected' }} @endif>
      Siria
    </option>
    <option value="SO" @if (old('country') == "SO") {{ 'selected' }} @endif>
      Somalia
    </option>
    <option value="LK" @if (old('country') == "LK") {{ 'selected' }} @endif>
      Sri
      Lanka
    </option>
    <option value="PM" @if (old('country') == "PM") {{ 'selected' }} @endif>
      St
      Pierre y Miquelon
    </option>
    <option value="SZ" @if (old('country') == "SZ") {{ 'selected' }} @endif>
      Suazilandia
    </option>
    <option value="SD" @if (old('country') == "SD") {{ 'selected' }} @endif>
      Sudán
    </option>
    <option value="SE" @if (old('country') == "SE") {{ 'selected' }} @endif>
      Suecia
    </option>
    <option value="CH" @if (old('country') == "CH") {{ 'selected' }} @endif>
      Suiza
    </option>
    <option value="SR" @if (old('country') == "SR") {{ 'selected' }} @endif>
      Surinam
    </option>
    <option value="TH" @if (old('country') == "TH") {{ 'selected' }} @endif>
      Tailandia
    </option>
    <option value="TW" @if (old('country') == "TW") {{ 'selected' }} @endif>
      Taiwán
    </option>
    <option value="TZ" @if (old('country') == "TZ") {{ 'selected' }} @endif>
      Tanzania
    </option>
    <option value="TJ" @if (old('country') == "TJ") {{ 'selected' }} @endif>
      Tayikistán
    </option>
    <option value="TF" @if (old('country') == "TF") {{ 'selected' }} @endif>
      Territorios franceses del Sur
    </option>
    <option value="TP" @if (old('country') == "TP") {{ 'selected' }} @endif>
      Timor
      Oriental
    </option>
    <option value="TG" @if (old('country') == "TG") {{ 'selected' }} @endif>
      Togo
    </option>
    <option value="TO" @if (old('country') == "TO") {{ 'selected' }} @endif>
      Tonga
    </option>
    <option value="TT" @if (old('country') == "TT") {{ 'selected' }} @endif>
      Trinidad
      y Tobago
    </option>
    <option value="TN" @if (old('country') == "TN") {{ 'selected' }} @endif>
      Túnez
    </option>
    <option value="TM" @if (old('country') == "TM") {{ 'selected' }} @endif>
      Turkmenistán
    </option>
    <option value="TR" @if (old('country') == "TR") {{ 'selected' }} @endif>
      Turquía
    </option>
    <option value="TV" @if (old('country') == "TV") {{ 'selected' }} @endif>
      Tuvalu
    </option>
    <option value="UA" @if (old('country') == "UA") {{ 'selected' }} @endif>
      Ucrania
    </option>
    <option value="UG" @if (old('country') == "UG") {{ 'selected' }} @endif>
      Uganda
    </option>
    <option value="Uruguay" @if (old('country') == "Uruguay") {{ 'selected' }} @endif>
      Uruguay
    </option>
    <option value="UZ" @if (old('country') == "UZ") {{ 'selected' }} @endif>
      Uzbekistán
    </option>
    <option value="VU" @if (old('country') == "VU") {{ 'selected' }} @endif>
      Vanuatu
    </option>
    <option value="Venezuela" @if (old('country') == "Venezuela") {{ 'selected' }} @endif>
      Venezuela
    </option>
    <option value="VN" @if (old('country') == "VN") {{ 'selected' }} @endif>
      Vietnam
    </option>
    <option value="YE" @if (old('country') == "YE") {{ 'selected' }} @endif>
      Yemen
    </option>
    <option value="YU" @if (old('country') == "YU") {{ 'selected' }} @endif>
      Yugoslavia
    </option>
    <option value="ZM" @if (old('country') == "ZM") {{ 'selected' }} @endif>
      Zambia
    </option>
    <option value="ZW" @if (old('country') == "ZW") {{ 'selected' }} @endif>
      Zimbabue
    </option>
  </select>

  @if ($errors->has('country'))
  <span style="color: red" class="help-block">
    <strong>{{ $errors->first('country') }}</strong>
  </span> @endif
</div>
