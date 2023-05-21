# Projekti Web 2 - Rentopia

# Përshkrim i projektit

Ky projekt eshte ndare ne dy pjese kryesore ne ballinen(Landing) dhe ne pjesen e dashbordave(gjithsej 3). Ky projekt i permban 3 lloje te ndryshme te usereve: Admin, Landlord(Pronar,Qiradhenes), Tenant(Qiramarres). Qellimi i projektit eshte menaxhimi me i lehte i pronave, pronareve dhe qiramarresve poashtu komunikimin mes tyre. Ky projekt eshte realizuar ne PHP , poashtu kemi perdorur Javascript, AJAX, dhe dy API;

Disa nga veçoritë kryesore të aplikacionit janë:

<b>Admin Dashboard: </b>

<ul>
<li>Faqja kryesore e dashboard ku shfaqen statistikat kryesore(Numri i pronareve, numri i pronave, numri i qiramarresve, pronat me te vlefshme, pronaret me se shumti prona, fitimet(5% te qirase)) etj.</li>
<li>Menaxhimi i Pronave, menaxhimi perfshine shtimin, editimin dhe fshirjen</li>
<li>Menaxhimi i Pronareve, menaxhimi perfshine shtimin, editimin dhe fshirjen</li>
<li>Menaxhimi i Qiramarresve, menaxhimi perfshine shtimin, editimin dhe fshirjen</li>
<li>Menaxhimi i profilit, menaxhimi perfshine editimin , ndryshimin e passwordit, fshirjen</li>
    </ul>
<br>
<b>Landlord Dashboard: </b> <li>Faqja kryesore e dashboard ku shfaqen statistikat kryesore(Numri i pronareve,numri i qiramarresve, pronat me te vlefshme, fitimet(-5% te qirase), nese nje prone ka me shume se nje qiramarres ateher qeraja ndahet ne dy pjese, qermarresit qe paguajn me se shumti) etj.</li>

<li>Menaxhimi i Pronave, menaxhimi perfshine shtimin, editimin dhe fshirjen</li>
<li>Menaxhimi i Qiramarresve, menaxhimi perfshine shtimin, editimin dhe fshirjen ne pronat qe posedon pronari</li>
<li>Menaxhimi i profilit, menaxhimi perfshine editimin , ndryshimin e passwordit, fshirjen</li>
<li>Shkruarja e ankesave tek qiramarresit qe ndodhen ne pronat e tij, e bere me AJAX</li>
<li>Leximi dhe opsioni per tu pergjigjur ankesave qe jane drejtuar nga qirammaresit tek pronari, e bere me AJAX</li>
<br>


<b>Tenant Dashboard: </b> <li>Faqja kryesore e dashboard ku shfaqen statistikat kryesore(Vleren e prones,numri i qiramarresve ne ate prone etj.)</li>

<li>Shkimi i detajeve te prones</li>
<li>Shkimi i detajeve te pronarit</li>
<li>Menaxhimi i profilit, menaxhimi perfshine editimin , ndryshimin e passwordit, fshirjen</li>
<li>Shkruarja e ankesave tek pronari i prones qe ai ndodhet, e bere me AJAX</li>
<li>Leximi dhe opsioni per tu pergjigjur ankesave qe jane drejtuar nga pronari tek qiramarresi, e bere me AJAX</li>

<br>
<b>Login: </b> Gjate logimit merret username dhe password shikohet nese ekzistojn dhe krijohet nje session dhe cookie(nese eshte klikuar remember me) per ate user, dhe e lejon qe te shkoj vetem tek faqet qe ka qasje te lire, po ashtu e personalizon faqen qe shafqet me ane te te dhenave te tij, ketu kemi perdorur nje API te Google perkatesishte: reCAPTCHA, per tu siguruar qe nuk ka hyre ndonje bot dhe deshiron te beje bruteforce por edhe per te parandaluar rreziqe tjera.
<br>
<br>
<b>Register: </b> Edhe tek pjesa e register kemi perdorur reCAPTCHA, ketu kur regjistrohet nje user do te regjistrohet si landlord, per arsyje se tenant mund te shtohet vetem nese ka nje prone per tu shtuar, dhe vetem landlord mund ta shtoj nje tenant ne nje prone, po ashtu vetem landlord mund te postoj prona(perpos adminit normalisht).
<br>
<br>
<b>Forget Password: </b> Tek forget password kemi perdorur nje API per dergimin e email-ve perkatesishte Elastic Email, ku emaili i dergohet userit qe deshiron ta ndryshoj passwordin, shikohet nese nje user ekziston me ate email, pastaj dergohet, ne email dergohet nje link qe dergon tek faqja per ndryshim, por ne link ndodhen edhe disa te dhena te gjeneruara gjate kohes kur eshte bere kerkesa per dergimin e emailit, atu ndodhen tokeni dhe nje validation code, te cilat gjenerohen vetem nje here per nje user dhe fshihen nga databaza, nese kur klikon ne link nese tokenet qe ndodhen ne link te cilat merren me metoden GET nuk perputhen me ato ne databaze ather useri nuk mund te vendos nje password te ri, nese po ateher e lejon.
<br>
<br>
<b>Landing: </b> Tek landing jane disa meny home, properties, contact us, faq. Tek home jane disa properies qe dalin ne faqen e pare, tek properites mund ti filtrojme me ane te keywords dhe sliders, filtrimi behet me ane te AJAX.
Poashtu ne meny ndodhen dhe butonat per login/register apo per dashboard/sign out.
<br>
<br>
<b>Procesi i shtimit dhe menaxhimit te usereve dhe pronave: </b>Kur shtojme nje user apo prone ate se pari e mbushim me te dhenat si emri, mbiemri, username, password(i hashuar), dhe te dhenat e tjear, por ka edhe fotografi per secilin user, fotografite ruhen lokalisht ne folderin uploads, ku ne kete folder gjenden folderet tjere qe i perkasin llojit te userit, ne databaze ruhet vetem emri i fotos, emri i fotos ruhet si[username-pic].[formati i fotos].

# Punuan:

•[Eriona Mustafa](https://github.com/ErionaM)

•[Adriatik Krasniqi](https://github.com/adriatik7)

•[Erisa Cërvadiku](https://github.com/erisa3002)

•[Arnis Hoxha](https://github.com/arnishox)

•[Ermal Limaj](https://github.com/ermallimaj)

•[Endri Binaku](https://github.com/BinakuEndri)

# Lënda:

`Ueb 2`

# Profesoret:

`Prof. Dr. Dhuratë Hyseni`

`Ass. Msc. Dalinë Vranovci`
