

//function qui s'auto appelle 

$(document).ready(function(){


   

        //je recupere mes elements 
     
        //dabor je recupere le formulaire
     
        var form = $('#formulaire');
     
        var crayon =$('#formulaire .crayon');

        var h2= $('#h2Form')

        var text = "Veuillez renseigner vos infos"

        var placeText="Veuillez remplir ce champs !!!"

        var i=0,j=0;

        var translate= 55;

        var car ="";

      
      
        window.setInterval(function(){

            translate+=10.5

        h2.append(text.charAt(i));

        $('#h2Img').css('transform','translate('+translate+'px) rotate(23deg)')


        i++;


        if(i>text.length){
            translate=55;
            h2.empty();
            $('#h2Img').css('transform','translate('+translate+'px) rotate(23deg)')
            i=0;
        }


        },300)

        // $('#sexe').selectmenu();

        $('#date').datepicker();

        $('#table').DataTable();

        var adresseTabs = [
            "Dakar Sandaga",
            "Mariste Fann",
            "Nordf Foire",
            "Keur Pathe Kane ,Mboro",
            "Cite 2000",
            "Scat Urbam",
            "Yoff Almadie"
           
        ];
        $( "#adresse" ).autocomplete({
            source: adresseTabs
        });

    
     

     var textSelect=""

     var textPrenom,textNom,textAdresse,textMail,textdate,textNumero,textSelect;
     var selectSexe,selectChoice;

    $('#dialogue').hide()

     var personnes=[

        {
            prenom : 'Ababacar',
            nom : 'Diaw',
            date_naissance : '02-01-1994',
            mail :'alouchboyz@gmail.com',
            centre_interets:"Sport,culture",
            numero : '77-551-02-69',
            sexe : 'Masculin',
            adresse : 'Nord-Foire'
        },
        {
            prenom : 'Mamadou Coulibaly',
            nom : 'Thiam',
            date_naissance : '02-01-1994',
            mail :'alouchboyz@gmail.com',
            numero : '77-551-02-69',
            centre_interets:"Sport,culture",
            sexe : 'Masculin',
            adresse : 'Médina'
        },
        {
            prenom: 'Birama',
            nom: 'Ndiaye',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            centre_interets:"Sport,culture",
            sexe: 'Masculin',
            adresse: 'Grand Yoff'
        },
        {
            prenom: 'El Hadj Douss',
            nom: 'Sy',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            centre_interets:"Sport,culture",
            sexe: 'Masculin',
            adresse: 'Colobane'
        }
        ,
        {
            prenom: 'Fagaye Sarr',
            nom: 'Gaye',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Féminin',
            centre_interets:"Sport,culture",
            adresse: 'Thies'
        },
        {
            prenom: 'Fama',
            nom: 'Thiam',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Féminin',
            centre_interets:"Sport,culture",
            adresse: 'Tivaouane'
        },
        {
            prenom: 'Ndiaga',
            nom: 'Guaye',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            centre_interets:"Sport,culture",
            numero: '77-551-02-69',
            sexe: 'Masculin',
            adresse: 'Taiba'
        },
        {
            prenom: 'Khadim',
            nom: 'Sall',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            centre_interets:"Sport,culture",
            sexe: 'Masculin',
            adresse: 'Pikine'
        },
        {
            prenom: 'Madické',
            nom: 'Diop',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Masculin',
            centre_interets:"Sport,culture",
            adresse: 'Rufisque'
        },
        {
            prenom: 'Mouhamed Lamine',
            nom: 'Ngom',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Masculin',
            centre_interets:"Sport,culture",
            adresse: 'Saint-Louis'
        },
        {
            prenom: 'Ousmane',
            nom: 'Séye',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            centre_interets:"Sport,culture",
            numero: '77-551-02-69',
            sexe: 'Masculin',
            adresse: 'Parcelles U-10'
        },
        {
            prenom: 'Pape Djiby',
            nom: 'Boh',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Masculin',
            centre_interets:"Sport,culture",
            adresse: 'Richard Toll'
        },
        {
            prenom: 'Papa',
            nom: 'Thiam',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Masculin',
            centre_interets:"Sport,culture",
            adresse: 'Louga'
        },
        {
            prenom: 'Pape Ousseynou',
            nom: 'Diop',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            sexe: 'Masculin',
            centre_interets:"Sport,culture",
            adresse: 'Mbour'
        },
        {
            prenom: 'Ousseynou',
            nom: 'Ndiaye',
            date_naissance: '02-01-1994',
            mail: 'alouchboyz@gmail.com',
            numero: '77-551-02-69',
            centre_interets:"Sport,culture",
            sexe: 'Masculin',
            adresse: 'Kaolack'
        }
        ,

        {
            nom:"Ngom",
            prenom:"Mouhamed Lamine",
            date_naissance:"20/02/2000",
            sexe:"Homme",
            centre_interets:"Sport",
            mail:"ngom@gmail.com",
            adresse:"Keur pathe kane Mboro",
            numero:"77 652 45 79 "
        },

        {
            nom:"Talla",
            prenom:"Ansoumane ",
            date_naissance:"20/02/2000",
            sexe:"Homme",
            centre_interets:"Sport,culture",
            mail:"ansou@gmail.com",
            adresse:"Cite 2000",
            numero:"78 122 27 02  "
        }
    ];
    
        // ajout des données au tableau


        function initialiseTable(personnes){
            $('#table tbody').empty();
            for(var index in personnes){

                ajoutePersonne(index,personnes[index]);
            }

            eventListener();

        }

        

          function ajoutePersonne(index ,personne){
            
           $('#table tbody').append(

            `
                <tr> 
                    <td>${index} </td>
                    <td>${personne.nom} </td>
                    <td>${personne.prenom} </td>
                    <td>${personne.date_naissance} </td>
                    <td>${personne.sexe} </td>
                    <td>${personne.centre_interets}</td>
                    <td>${personne.mail} </td>
                    <td>${personne.adresse} </td>
                    <td>${personne.numero} </td>
                    <td><img class="supprimer" alt="supprimer" id=${index} src="images/delete2.png"></td>
                    <td><img class="modifier" alt="modifier" id=${index} src="images/edit-icon.png"></td>
                </tr>
            `
           )
    
        }
        
        function isEmptyInputs(inputs){

            for(var inpt in inputs){
    
                if(inputs[inpt].value==""){
    
                   return true;
    
                
                }
            }
    
    
            return false ;
    
        }

       $('#ajouter').click(function(){

        var inputs = $('form input')
        textPrenom=$('#prenom').val()
        textNom= $('#nom').val()
        textdate= $('#date_naissance').val()
        textMail= $('#mail').val()
        textAdresse= $('#adresse').val()
        textNumero= $('#numero').val()
        selectSexe = $('#sexe').val()
        selectChoice = $('#centre-interets').val();

        if(selectChoice.length>1){

            selectChoice=selectChoice.join(",");
        }else {

            if(selectChoice==null){

                alert('Veuillez choisir un centre d\'interet ');
            }
        }
        if(!isEmptyInputs(inputs)){

             personne= 

                {
                    nom: textNom,
                    prenom:textPrenom,
                    date_naissance:textdate,
                    sexe:selectSexe,
                    centre_interets:selectChoice,
                    mail:textMail,
                    adresse:textAdresse,
                    numero:textNumero

                }

         createObject(personne)

         resetForm();

        }else{

            $('#dialogue').dialog();
        }

    
     })

     function createObject(personne){

        personnes.push(personne)

        misAjourPersonnes(personnes)
    }


     function misAjourPersonnes(personnes){
        // $('#table tbody').empty();
        initialiseTable(personnes)
     }


     initialiseTable(personnes)

     function resetForm(){

        $('#prenom').val("")
        $('#nom').val("")

        $('#date_naissance').val("")

        $('#sexe').val("")

        $('#centre_interets').val("")
        
        $('#mail').val("")

        $('#adresse').val("")
        
        $('#numero').val("")
     }

     
     
     function eventListener(){

        $('.supprimer').click(function(){

            var   index = this.id

            personnes.splice(index,1)
            misAjourPersonnes(personnes)

        })

        $('.modifier').click(function(){

            var index = this.id;

            $('#prenom').val(personnes[index].prenom)
            $('#nom').val(personnes[index].nom)

            $('#date_naissance').val(personnes[index].date_naissance)

            $('#sexe').val(personnes[index].sexe)

            $('#centre_interets').val(personnes[index].centre_interets)
            
            $('#mail').val(personnes[index].mail)

            $('#adresse').val(personnes[index].adresse)
            
            $('#numero').val(personnes[index].numero)

            
            $('#ajouter').text("modifier")


            



        })

    }

       
  
    

        
    
     
})






  