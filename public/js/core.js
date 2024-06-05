(function() {
    const Style = `:host {gap: 1px;display: flex;margin: 0 auto;flex-wrap: wrap;overflow: hidden;width: max-content;border-radius: .25rem;}[part="btns"] {display: flex;border: unset;outline: unset;background: unset;align-items: center;padding: .25rem .5rem;border-radius: .20rem;text-decoration: unset;justify-content: center;color: {{ @Theme.colors("WHITE") }};background: red;}[part="btns"]:hover,[part="btns"]:focus,[part="btns"]:focus-within {cursor: pointer;color: {{ @Theme.colors("BLACK") }};}[part="svgs"] {width: 1rem;height: 1rem;display: block;pointer-events: none;}{$ if @props.scene $}[part="btns"][title="scene"] {background: {{ @Theme.colors("GRAY", 400) }};}[part="btns"][title="scene"]:hover,[part="btns"][title="scene"]:focus,[part="btns"][title="scene"]:focus-within {background: {{ @Theme.colors("GRAY", 400, 60) }};}{$ endif $}{$ if @props.print $}[part="btns"][title="print"] {background: {{ @Theme.colors("GREEN", 400) }};}[part="btns"][title="print"]:hover,[part="btns"][title="print"]:focus,[part="btns"][title="print"]:focus-within {background: {{ @Theme.colors("GREEN", 400, 60) }};}{$ endif $}{$ if @props.patch $}[part="btns"][title="patch"] {background: {{ @Theme.colors("YELLOW", 400) }};}[part="btns"][title="patch"]:hover,[part="btns"][title="patch"]:focus,[part="btns"][title="patch"]:focus-within {background: {{ @Theme.colors("YELLOW", 400, 60) }};}{$ endif $}{$ if @truty(@props.clear) && @truty(@props.csrf) $}[part="btns"][title="clear"] {background: {{ @Theme.colors("RED", 400) }};}[part="btns"][title="clear"]:hover,[part="btns"][title="clear"]:focus,[part="btns"][title="clear"]:focus-within {background: {{ @Theme.colors("RED", 400, 60) }};}{$ endif $}`;

    const Template = `{$ if @props.scene $}<a title="scene" href="{{ @props.scene.replace('XXX', @props.target) }}" part="btns"><svg part="svgs" fill="currentcolor" viewBox="0 -960 960 960"><path d="M99-272q-19.325 0-32.662-13.337Q53-298.675 53-318v-319q0-20.3 13.338-33.15Q79.675-683 99-683h73q18.9 0 31.95 12.85T217-637v319q0 19.325-13.05 32.663Q190.9-272 172-272H99Zm224 96q-20.3 0-33.15-13.05Q277-202.1 277-221v-513q0-19.325 12.85-32.662Q302.7-780 323-780h314q20.3 0 33.15 13.338Q683-753.325 683-734v513q0 18.9-12.85 31.95T637-176H323Zm465-96q-18.9 0-31.95-13.337Q743-298.675 743-318v-319q0-20.3 13.05-33.15Q769.1-683 788-683h73q19.325 0 33.162 12.85Q908-657.3 908-637v319q0 19.325-13.838 32.663Q880.325-272 861-272h-73Z" /></svg></a>{$ endif $}{$ if @props.print $}<a title="print" href="{{ @props.print.replace('XXX', @props.target) }}" part="btns"><svg part="svgs" fill="currentcolor" viewBox="0 -960 960 960"><pathd="M741-701H220v-160h521v160Zm-17 236q18 0 29.5-10.812Q765-486.625 765-504.5q0-17.5-11.375-29.5T724.5-546q-18.5 0-29.5 12.062-11 12.063-11 28.938 0 18 11 29t29 11Zm-75 292v-139H311v139h338Zm92 86H220v-193H60v-264q0-53.65 36.417-91.325Q132.833-673 186-673h588q54.25 0 90.625 37.675T901-544v264H741v193Z" /></svg></a>{$ endif $}{$ if @props.patch $}<a title="patch" href="{{ @props.patch.replace('XXX', @props.target) }}" part="btns"><svg part="svgs" fill="currentcolor" viewBox="0 -960 960 960"><path d="M170-103q-32 7-53-14.5T103-170l39-188 216 216-188 39Zm235-78L181-405l435-435q27-27 64.5-27t63.5 27l96 96q27 26 27 63.5T840-616L405-181Z" /></svg></a>{$ endif $}{$ if @truty(@props.clear) && @truty(@props.csrf) $}<form action="{{ @props.clear.replace('XXX', @props.target) }}" method="POST"><input type="hidden" name="_token" value="{{ @props.csrf }}" autocomplete="off" /><input type="hidden" name="_method" value="delete" /><button type="submit" title="clear" part="btns"><svg part="svgs" fill="currentcolor" viewBox="0 -960 960 960"><path d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" /></svg></button></form>{$ endif $}`;

    Neo.Component({
        tag: "action-tools",
        tpl: Template,
        css: Style
    })({
        props: {
            "csrf": null,
            "scene": null,
            "print": null,
            "patch": null,
            "clear": null,
            "target": null
        },
        cycle: {
            mounted() {
                if (this.hasAttribute("csrf")) {
                    this.props.csrf = this.getAttribute("csrf");
                    this.removeAttribute("csrf");
                }

                if (this.hasAttribute("target")) {
                    this.props.target = this.getAttribute("target");
                    this.removeAttribute("target");
                }

                if (this.hasAttribute("scene")) {
                    this.props.scene = this.getAttribute("scene");
                    this.removeAttribute("scene");
                }

                if (this.hasAttribute("print")) {
                    this.props.print = this.getAttribute("print");
                    this.removeAttribute("print");
                }

                if (this.hasAttribute("patch")) {
                    this.props.patch = this.getAttribute("patch");
                    this.removeAttribute("patch");
                }

                if (this.hasAttribute("clear")) {
                    this.props.clear = this.getAttribute("clear");
                    this.removeAttribute("clear");
                }
            }
        }
    }).define();
})();

Neo.Locales.fr = {
    ...Neo.Locales.fr,
    "Id": "Id",
    "Email": "E-mail",
    "First Name": "Prénom",
    "Last Name": "Nom De Famille",
    "Gender": "Genre",
    "Birth Date": "Date De Naissance",
    "Phone": "Téléphone",
    "Address": "Adresse",
    "Male": "Homme",
    "Female": "Femme",
    "Actions": "Actions",

    "Image": "Image",
    "Name": "Nom",
    "Description": "Description",
    "Details": "Détails",
    "Brand": "Marque",
    "Category": "Catégorie",
    "Price": "Prix",
    "Status": "Statut",

    "Transmission": "Transmission",
    "Fuel": "Carburant",
    "Passengers": "Passagers",
    "Doors": "Portes",
    "Cargo": "Cargo",
    "Promote": "Promouvoir",
    "Yes": "Oui",
    "No": "Non",
    "Available": "Disponible",
    "Not Available": "Non Disponible",
    "Manual": "Manuel",
    "Automatic": "Automatique",
    "Semi Automatic": "Semi Automatique",
    "Gasoline": "Essence",
    "Diesel": "Diesel",
    "Electric": "Électrique",
    "Hybrid": "Hybride",
    "Hydrogen": "Hydrogène",

    "Title": "Titre",
    "Car": "Voiture",
    "Charges": "Frais",
    "canceled": "annulé",
    "pendding": "en attente",
    "confirmed": "confirmé",
    "completed": "terminé",
    "Location": "Emplacement",
    "From": "De",
    "To": "À",
    "Total": "Total",
    "Profit": "Profit",
    "Period": "Période",
    "Days": "Jours",
}

Neo.Locales.it = {
    /** months */
    "January": "Gennaio",
    "February": "Febbraio",
    "March": "Marzo",
    "April": "Aprile",
    "May": "Maggio",
    "June": "Giugno",
    "July": "Luglio",
    "August": "Agosto",
    "September": "Settembre",
    "October": "Ottobre",
    "November": "Novembre",
    "December": "Dicembre",
    /** days */
    "Sunday": "Domenica",
    "Monday": "Lunedì",
    "Tuesday": "Martedì",
    "Wednesday": "Mercoledì",
    "Thursday": "Giovedì",
    "Friday": "Venerdì",
    "Saturday": "Sabato",
    /** components */
    "Print": "Stampa",
    "Search": "Ricerca",
    "Columns": "Colonne",
    "Download": "Scaricare",
    "No Data Found": "Nessun Dato Trovato",

    "Id": "Id",
    "Email": "E-mail",
    "First Name": "Nome",
    "Last Name": "Cognome",
    "Gender": "Genere",
    "Birth Date": "Data Di Nascita",
    "Phone": "Telefono",
    "Address": "Indirizzo",
    "Male": "Maschio",
    "Female": "Femmina",
    "Actions": "Azioni",

    "Image": "Immagine",
    "Name": "Nome",
    "Description": "Descrizione",
    "Details": "Dettagli",
    "Brand": "Marca",
    "Category": "Categoria",
    "Price": "Prezzo",
    "Status": "Stato",

    "Transmission": "Trasmissione",
    "Fuel": "Carburante",
    "Passengers": "Passeggeri",
    "Doors": "Porte",
    "Cargo": "Carico",
    "Promote": "Promuovere",
    "Yes": "Sì",
    "No": "No",
    "Available": "Disponibile",
    "Not Available": "Non Disponibile",
    "Manual": "Manuale",
    "Automatic": "Automatico",
    "Semi Automatic": "Semiautomatico",
    "Gasoline": "Benzina",
    "Diesel": "Diesel",
    "Electric": "Elettrico",
    "Hybrid": "Ibrido",
    "Hydrogen": "Idrogeno",

    "Title": "Titolo",
    "Car": "Auto",
    "Charges": "Costi",
    "canceled": "annullato",
    "pendding": "in attesa",
    "confirmed": "confermato",
    "completed": "completato",
    "Location": "Posizione",
    "From": "Da",
    "To": "A",
    "Total": "Totale",
    "Profit": "Profitto",
    "Period": "Periodo",
    "Days": "Giorni",
}

Neo.Locales.sp = {
    /** months */
    "January": "Enero",
    "February": "Febrero",
    "March": "Marzo",
    "April": "Abril",
    "May": "Mayo",
    "June": "Junio",
    "July": "Julio",
    "August": "Agosto",
    "September": "Septiembre",
    "October": "Octubre",
    "November": "Noviembre",
    "December": "Diciembre",
    /** days */
    "Sunday": "Domingo",
    "Monday": "Lunes",
    "Tuesday": "Martes",
    "Wednesday": "Miércoles",
    "Thursday": "Jueves",
    "Friday": "Viernes",
    "Saturday": "Sábado",
    /** components */
    "Print": "Imprimir",
    "Search": "Buscar",
    "Columns": "Columnas",
    "Download": "Descargar",
    "No Data Found": "No Se Encontraron Datos",

    "Id": "Id",
    "Email": "Correo Electrónico",
    "First Name": "Nombre",
    "Last Name": "Apellido",
    "Gender": "Género",
    "Birth Date": "Fecha De Nacimiento",
    "Phone": "Teléfono",
    "Address": "Dirección",
    "Male": "Hombre",
    "Female": "Mujer",
    "Actions": "Acciones",

    "Image": "Imagen",
    "Name": "Nombre",
    "Description": "Descripción",
    "Details": "Detalles",
    "Brand": "Marca",
    "Category": "Categoría",
    "Price": "Precio",
    "Status": "Estado",

    "Transmission": "Transmisión",
    "Fuel": "Combustible",
    "Passengers": "Pasajeros",
    "Doors": "Puertas",
    "Cargo": "Carga",
    "Promote": "Promover",
    "Yes": "Sí",
    "No": "No",
    "Available": "Disponible",
    "Not Available": "No Disponible",
    "Manual": "Manual",
    "Automatic": "Automático",
    "Semi Automatic": "Semiautomático",
    "Gasoline": "Gasolina",
    "Diesel": "Diésel",
    "Electric": "Eléctrico",
    "Hybrid": "Híbrido",
    "Hydrogen": "Hidrógeno",

    "Title": "Título",
    "Car": "Coche",
    "Charges": "Cargos",
    "canceled": "cancelado",
    "pendding": "pendiente",
    "confirmed": "confirmado",
    "completed": "completado",
    "Location": "Ubicación",
    "From": "Desde",
    "To": "Hasta",
    "Total": "Total",
    "Profit": "Beneficio",
    "Period": "Período",
    "Days": "Días",
}

const Locale = document.documentElement.lang,
    BasePath = window.location.origin + "/storage/IMAGES/",
    Background = "rgb(" + getComputedStyle(document.documentElement)
    .getPropertyValue("--prime") + ")",
    Color = "rgb(" + getComputedStyle(document.documentElement)
    .getPropertyValue("--white") + ")",
    Currency = document.querySelector("[name=currency]").content,
    COLS = {
        most: () => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "image",
            text: Neo.Helper.trans('Image'),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => `<img part="image" style="margin:auto;display:block;width:4rem;aspect-ratio:1/1;object-fit:contain;object-position:center;background:rgb(209 209 209);" src="${BasePath + row.storage}" />`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return BasePath + row.image.storage;
            },
        }, {
            name: "name",
            text: Neo.Helper.trans('Name'),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "price",
            text: Neo.Helper.trans("Price") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.price, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "profit",
            text: Neo.Helper.trans("Profit") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.profit, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "charges",
            text: Neo.Helper.trans("Charges") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.charges, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "period",
            text: Neo.Helper.trans("Period"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => row.period + " " + Neo.Helper.trans("Days"),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }],
        users: ({
            Csrf,
            Patch,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "first_name",
            text: Neo.Helper.trans("First Name"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.first_name),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "last_name",
            text: Neo.Helper.trans("Last Name"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.last_name),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "gender",
            text: Neo.Helper.trans("Gender"),
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.gender ? Neo.Helper.Str.capitalize(Neo.Helper.trans(row.gender)) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "birth_date",
            text: Neo.Helper.trans("Birth Date"),
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.birth_date ? row.birth_date : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "email",
            text: Neo.Helper.trans("Email"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "phone",
            text: Neo.Helper.trans("Phone"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "address",
            text: Neo.Helper.trans("Address"),
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.address ? Neo.Helper.Str.capitalize(row.address) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
        brands: ({
            Csrf,
            Patch,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "image",
            text: Neo.Helper.trans('Image'),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => `<img part="image" style="margin:auto;display:block;width:4rem;aspect-ratio:1/1;object-fit:contain;object-position:center;background:rgb(209 209 209);" src="${BasePath + row.image.storage}" />`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return BasePath + row.image.storage;
            },
        }, {
            name: "name_en",
            text: Neo.Helper.trans('Name'),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_en",
            text: Neo.Helper.trans('Description') + " (en)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_en ? Neo.Helper.Str.capitalize(row.description_en) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_fr",
            text: Neo.Helper.trans('Description') + " (fr)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_fr ? Neo.Helper.Str.capitalize(row.description_fr) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_it",
            text: Neo.Helper.trans('Description') + " (it)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_it ? Neo.Helper.Str.capitalize(row.description_it) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_sp",
            text: Neo.Helper.trans('Description') + " (sp)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_sp ? Neo.Helper.Str.capitalize(row.description_sp) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
        categories: ({
            Csrf,
            Patch,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "image",
            text: Neo.Helper.trans('Image'),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => `<img part="image" style="margin:auto;display:block;width:4rem;aspect-ratio:1/1;object-fit:contain;object-position:center;background:rgb(209 209 209);" src="${BasePath + row.image.storage}" />`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return BasePath + row.image.storage;
            },
        }, {
            name: "name_en",
            text: Neo.Helper.trans('Name'),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_en",
            text: Neo.Helper.trans('Description') + " (en)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_en ? Neo.Helper.Str.capitalize(row.description_en) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_fr",
            text: Neo.Helper.trans('Description') + " (fr)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_fr ? Neo.Helper.Str.capitalize(row.description_fr) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_it",
            text: Neo.Helper.trans('Description') + " (it)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_it ? Neo.Helper.Str.capitalize(row.description_it) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "description_sp",
            text: Neo.Helper.trans('Description') + " (sp)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.description_sp ? Neo.Helper.Str.capitalize(row.description_sp) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
        cars: ({
            Csrf,
            Patch,
            Scene,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "image",
            text: Neo.Helper.trans('Image'),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => `<img part="image" style="margin:auto;display:block;width:4rem;aspect-ratio:1/1;object-fit:contain;object-position:center;background:rgb(209 209 209);" src="${BasePath + row.images[0].storage}" />`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return BasePath + row.image.storage;
            },
        }, {
            name: "name_en",
            text: Neo.Helper.trans('Name'),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "brand",
            text: Neo.Helper.trans('Brand'),
            headPdfStyle: {
                background: Background,
                color: Color,
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.brand.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "category",
            text: Neo.Helper.trans('Category'),
            headPdfStyle: {
                background: Background,
                color: Color,
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.category.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "price",
            text: Neo.Helper.trans("Price") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.price, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "transmission",
            text: Neo.Helper.trans("Transmission"),
            visible: false,
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.trans(Neo.Helper.Str.capitalize(row.transmission)),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "fuel",
            text: Neo.Helper.trans("Fuel"),
            visible: false,
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.trans(Neo.Helper.Str.capitalize(row.fuel)),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "passengers",
            text: Neo.Helper.trans("Passengers"),
            visible: false,
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
        }, {
            name: "doors",
            text: Neo.Helper.trans("Doors"),
            visible: false,
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
        }, {
            name: "cargo",
            text: Neo.Helper.trans("Cargo"),
            visible: false,
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
        }, {
            name: "promote",
            text: Neo.Helper.trans("Promote"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.trans(Neo.Helper.Str.capitalize(row.promote ? 'yes' : 'no')),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "status",
            text: Neo.Helper.trans("Status"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.trans(Neo.Helper.Str.capitalize(row.status)),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_en",
            text: Neo.Helper.trans('Details') + " (en)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_en ? Neo.Helper.Str.capitalize(row.details_en) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_fr",
            text: Neo.Helper.trans('Details') + " (fr)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_fr ? Neo.Helper.Str.capitalize(row.details_fr) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_it",
            text: Neo.Helper.trans('Details') + " (it)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_it ? Neo.Helper.Str.capitalize(row.details_it) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_sp",
            text: Neo.Helper.trans('Details') + " (sp)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_sp ? Neo.Helper.Str.capitalize(row.details_sp) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"scene="${Scene}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
        car: () => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "Name",
            text: Neo.Helper.trans("Name"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "phone",
            text: Neo.Helper.trans("Phone"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "email",
            text: Neo.Helper.trans("Email"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            visible: false,
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.email),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "location",
            text: Neo.Helper.trans("Location"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            visible: false,
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.location),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "from",
            text: Neo.Helper.trans("From"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "to",
            text: Neo.Helper.trans("To"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "period",
            text: Neo.Helper.trans("Period"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => row.period + " " + Neo.Helper.trans("Days"),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "profit",
            text: Neo.Helper.trans("Profit") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.total - JSON.parse(row.charges).total, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "charges",
            text: Neo.Helper.trans("Charges") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(JSON.parse(row.charges).total, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "status",
            text: Neo.Helper.trans("Status"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.status),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }],
        reservations: ({
            Csrf,
            Patch,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "Name",
            text: Neo.Helper.trans("Name"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.name),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "phone",
            text: Neo.Helper.trans("Phone"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "email",
            text: Neo.Helper.trans("Email"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            visible: false,
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.email),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "car",
            text: Neo.Helper.trans("Car"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.car.name_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "location",
            text: Neo.Helper.trans("Location"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.location),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "from",
            text: Neo.Helper.trans("From"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "to",
            text: Neo.Helper.trans("To"),
            headPdfStyle: {
                background: Background,
                color: Color
            },
        }, {
            name: "period",
            text: Neo.Helper.trans("Period"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => row.period + " " + Neo.Helper.trans("Days"),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "total",
            text: Neo.Helper.trans("Total") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.total, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "charges",
            text: Neo.Helper.trans("Charges") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(JSON.parse(row.charges).total, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "profit",
            text: Neo.Helper.trans("Profit") + " (" + Currency + ")",
            headStyle: { width: 120, textAlign: "center", },
            bodyStyle: { width: 120, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.money(row.total - JSON.parse(row.charges).total, 3),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "status",
            text: Neo.Helper.trans("Status"),
            headStyle: { width: 100, textAlign: "center", },
            bodyStyle: { width: 100, textAlign: "center", },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.status),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
        blogs: ({
            Csrf,
            Patch,
            Clear
        }) => [{
            name: "id",
            text: Neo.Helper.trans("Id"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) =>
                `<span style="font-weight: 500; text-align: center; display: block;">#${row.id}</span>`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "image",
            text: Neo.Helper.trans('Image'),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyRender: (row) => `<img part="image" style="margin:auto;display:block;width:4rem;aspect-ratio:1/1;object-fit:contain;object-position:center;background:rgb(209 209 209);" src="${BasePath + row.image.storage}" />`,
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return BasePath + row.image.storage;
            },
        }, {
            name: "title_en",
            text: Neo.Helper.trans('Title') + " (en)",
            visible: Locale === "en",
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.title_en),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "title_fr",
            text: Neo.Helper.trans('Title') + " (fr)",
            visible: Locale === "fr",
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.title_fr),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "title_it",
            text: Neo.Helper.trans('Title') + " (it)",
            visible: Locale === "it",
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.title_it),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "title_sp",
            text: Neo.Helper.trans('Title') + " (sp)",
            visible: Locale === "sp",
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => Neo.Helper.Str.capitalize(row.title_sp),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_en",
            text: Neo.Helper.trans('Details') + " (en)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_en ? Neo.Helper.Str.capitalize(row.details_en) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_fr",
            text: Neo.Helper.trans('Details') + " (fr)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_fr ? Neo.Helper.Str.capitalize(row.details_fr) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_it",
            text: Neo.Helper.trans('Details') + " (it)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_it ? Neo.Helper.Str.capitalize(row.details_it) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "details_sp",
            text: Neo.Helper.trans('Details') + " (sp)",
            visible: false,
            headPdfStyle: {
                background: Background,
                color: Color
            },
            bodyRender: (row) => row.details_sp ? Neo.Helper.Str.capitalize(row.details_sp) : empty(),
            bodyPdfRender: function(row) {
                return this.bodyRender(row);
            },
            bodyCsvRender: function(row) {
                return this.bodyRender(row);
            },
        }, {
            name: "action",
            text: Neo.Helper.trans("Actions"),
            headStyle: { width: 20, textAlign: "center" },
            bodyStyle: { width: 20, textAlign: "center" },
            bodyRender: (row) => {
                return `<action-tools target="${row.id}"csrf="${Csrf}"patch="${Patch}"clear="${Clear}"></action-tools>`;
            },
            headPdfStyle: function() {
                return {...this.headStyle, background: Background, color: Color };
            },
            bodyPdfStyle: function() {
                return this.bodyStyle;
            },
            bodyPdfRender: () => empty(),
            bodyCsvRender: () => empty(),
        }],
    }

Neo.load(function() {
    document.querySelectorAll(".nav-colors svg").forEach((svg, i) => {
        if (i < 10) svg.style.color = "var(--color-" + i + ")";
    });

    document.querySelectorAll(".sys-colors svg").forEach((svg, i) => {
        if (i < 10) svg.style.color = "var(--color-sys-" + i + ")";
    });
});

function empty() {
    return "__";
}

async function getData(url, createLinks) {
    const req = await fetch(url);
    const res = await req.json();
    createLinks && createLinks(res.prev_cursor, res.next_cursor, (new URL(url)).searchParams.get("search"));
    return res.data;
}

function TableVisualizer(dataVisualizer, Type, Data) {
    var timer;
    const Links = document.createElement("div");
    Links.innerHTML = `<a id="prev" slot="end" aria-label="prev_page_link" class="block w-6 h-6 text-x-black outline-none relative isolate before:content-[''] before:rounded-x-thin before:absolute before:block before:w-[130%] before:h-[130%] before:-inset-[15%] before:-z-[1] before:!bg-opacity-40 hover:before:bg-x-shade focus:before:bg-x-shade focus-within:before:bg-x-shade"><svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960"><path d="M452-219 190-481l262-262 64 64-199 198 199 197-64 65Zm257 0L447-481l262-262 63 64-198 198 198 197-63 65Z" /></svg></a><a id="next" slot="end" aria-label="next_page_link" class="block w-6 h-6 text-x-black outline-none relative isolate before:content-[''] before:rounded-x-thin before:absolute before:block before:w-[130%] before:h-[130%] before:-inset-[15%] before:-z-[1] before:!bg-opacity-40 hover:before:bg-x-shade focus:before:bg-x-shade focus-within:before:bg-x-shade"><svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960"><path d="M388-481 190-679l64-64 262 262-262 262-64-65 198-197Zm257 0L447-679l63-64 262 262-262 262-63-65 198-197Z" /></svg></a>`;

    async function event(e) {
        e.preventDefault();
        dataVisualizer.loading = true;
        dataVisualizer.rows = await getData(e.target.href, createLinks);
        dataVisualizer.loading = false;
    }

    function createLinks(prev, next, str) {
        const search = "?search" + (str ? ("=" + str) : "");
        const preva = document.querySelector("#prev");
        const nexta = document.querySelector("#next");
        if (prev) {
            const href = Data.Search + search + "&cursor=" + prev;
            if (preva) preva.href = href
            else {
                const _preva = Links.querySelector("#prev").cloneNode(true);
                _preva.addEventListener("click", event);
                if (nexta) dataVisualizer.insertBefore(_preva, nexta);
                else dataVisualizer.appendChild(_preva);
                _preva.title = Neo.Helper.trans("Prev");
                _preva.href = href;
            }
        } else {
            if (preva) {
                preva.removeEventListener("click", event);
                preva.remove();
            }
        }
        if (next) {
            const href = Data.Search + search + "&cursor=" + next;
            if (nexta) nexta.href = href
            else {
                const _nexta = Links.querySelector("#next").cloneNode(true);
                _nexta.addEventListener("click", event);
                dataVisualizer.appendChild(_nexta);
                _nexta.title = Neo.Helper.trans("Next");
                _nexta.href = href;
            }
        } else {
            if (nexta) {
                nexta.removeEventListener("click", event);
                nexta.remove();
            }
        }
    }

    (async function() {
        dataVisualizer.loading = true;
        dataVisualizer.rows = await getData(Data.Search + window.location.search, createLinks);
        dataVisualizer.loading = false;
    })();

    dataVisualizer.cols = COLS[Type]({
        Currency: Data.Currency,
        Scene: Data.Scene,
        Print: Data.Print,
        Patch: Data.Patch,
        Clear: Data.Clear,
        Csrf: Data.Csrf,
    });

    dataVisualizer.addEventListener("search", async e => {
        e.preventDefault();
        if (timer) clearTimeout(timer);
        dataVisualizer.loading = true;
        dataVisualizer.rows = await new Promise((resolver, rejecter) => {
            timer = setTimeout(async() => {
                const data = await getData(Data.Search + "?search=" +
                    encodeURIComponent(e.detail
                        .data), createLinks);
                resolver(data);
            }, 2000);
        });
        dataVisualizer.loading = false;
    });
}

function CarInitializer(List = [], imageTransfer) {
    ["#description_en", "#description_fr", "#description_it", "#description_sp"].forEach(editor => {
        new RichTextEditor(editor);
    });

    document.querySelectorAll("[rte-cmd-name=fullscreenenter]").forEach(el => {
        el.addEventListener("click", e => {
            Neo.Wrapper.rules.closed();
        })
    });

    document.querySelectorAll("[rte-cmd-name=fullscreenexit]").forEach(el => {
        el.addEventListener("click", e => {
            Neo.Wrapper.rules.opened();
        })
    });

    if (imageTransfer) imageTransfer.addEventListener("delete", ({ detail: { data } }) => {
        if (data instanceof File) return;
        imageTransfer.insertAdjacentHTML("afterend", `<input type="hidden" name="deleted[]" value="${data.id}" />`);
    });

    List.forEach(Item => {
        var timer;
        Item.Auto.addEventListener("input", async(e) => {
            if (timer) clearTimeout(timer);
            Item.Auto.data = await new Promise((resolver, rejecter) => {
                timer = setTimeout(async() => {
                    const data = await getData(Item.Link + "?search=" +
                        encodeURIComponent(
                            Item.Auto.query.trim()));
                    resolver(data);
                }, 1000);
            });
        });
    });
}

function BlogInitializer(data) {
    ["#content_en", "#content_fr", "#content_it", "#content_sp"].forEach(editor => {
        new RichTextEditor(editor);
    });

    document.querySelectorAll("[rte-cmd-name=fullscreenenter]").forEach(el => {
        el.addEventListener("click", e => {
            Neo.Wrapper.rules.closed();
        })
    });

    document.querySelectorAll("[rte-cmd-name=fullscreenexit]").forEach(el => {
        el.addEventListener("click", e => {
            Neo.Wrapper.rules.opened();
        })
    });

    if (data) {
        const imageTransfer = document.querySelector("neo-imagetransfer");
        imageTransfer.default = [{
            src: data
        }];
    }
}

function ReservationInitializer({ Search }, data) {
    const auto = document.querySelector("neo-autocomplete"),
        value = document.querySelector("#charge_value"),
        trigger = document.querySelector("#charge_trigger"),
        modal = document.querySelector("#charge_modal"),
        name = document.querySelector("#charge_name"),
        cost = document.querySelector("#charge_cost"),
        show = document.querySelector("#charge_show"),
        add = document.querySelector("#charge_add");

    trigger.addEventListener("click", e => {
        modal.show();
    });

    function CreateRow({
        name,
        cost
    }) {
        DATA.items.push({
            name,
            cost
        });
        const row = (new DOMParser).parseFromString(
            `<table><tr class="border-t border-x-shade"><td data-for="name" class="text-x-black text-base font-bold px-4 py-2 first:ps-8 last:pe-8">${name}</td><td data-for="price" class="text-x-black text-base px-4 py-2 text-center w-[100px] first:ps-8 last:pe-8">${cost}</td><td class="text-x-black text-base px-4 py-2 text-center w-[20px] first:ps-8 last:pe-8"><button class="flex px-2 py-1 outline-none rounded-x-thin bg-red-400 text-x-white hover:bg-opacity-60 focus:bg-opacity-60 focus-within:bg-opacity-60"><svg class="w-4 h-4 block pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960"><path d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" /></svg></button></td></tr></table> `,
            "text/html").querySelector("tr");
        row.Btn = row.querySelector("button");

        row.Btn.addEventListener("click", e => {
            row.remove();
            DATA.items = DATA.items.filter(e => e.name !== name);
            Calculate();
        });

        Calculate();
        return row;
    }

    const DATA = {
        total: 0,
        items: [],
    }

    function Calculate() {
        DATA.total = DATA.items.reduce((a, e) => a + e.cost, 0);
        value.value = JSON.stringify(DATA);
        trigger.value = DATA.total;
    }

    add.addEventListener("click", e => {
        if (name.value.trim() && cost.value.trim()) {
            const row = CreateRow({
                name: name.value.trim(),
                cost: +cost.value.trim()
            });
            name.value = "";
            cost.value = "";
            show.appendChild(row);
            name.focus();
        }
    });

    var timer;
    auto.addEventListener("input", async(e) => {
        if (timer) clearTimeout(timer);
        auto.data = await new Promise((resolver, rejecter) => {
            timer = setTimeout(async() => {
                const data = await getData(Search + "?search=" +
                    encodeURIComponent(
                        auto.query.trim()));
                resolver(data);
            }, 1000);
        });
    });

    if (data) {
        data.forEach(d => {
            if (d.name.trim() && d.cost) {
                const row = CreateRow({
                    name: d.name.trim(),
                    cost: d.cost
                });
                show.appendChild(row);
            }
        });
    }
}

async function CoreInitializer({ Table, Pie, Line, Search, Data, Profit, Charges }) {
    TableVisualizer(Table, "most", { Search });

    new Chart(Pie, {
        type: "doughnut",
        data: {
            labels: [Neo.Helper.trans("Profit"), Neo.Helper.trans("Charges")],
            datasets: [{
                data: [Profit, Charges],
                borderWidth: 1,
                backgroundColor: ["#22C55E", "#EC4899"],
                borderColor: ["#22C55E", "#EC4899"]
            }, ]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false,
                }
            },
        }
    });

    const data = await getData(Data);
    data[0] = data[0].map(e => Neo.Helper.trans(e));

    new Chart(line, {
        type: "line",
        data: {
            labels: data[0],
            datasets: [{
                data: data[1],
                borderWidth: 2,
                backgroundColor: "#22C55E",
                borderColor: "#22C55E"
            }, {
                data: data[2],
                borderWidth: 2,
                backgroundColor: "#EC4899",
                borderColor: "#EC4899"
            }, ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                }
            },
        }
    });

    line.parentElement.classList.remove("aspect-video");
    line.nextElementSibling.remove();

    document.querySelector("#printer").addEventListener("click", () => {
        document.querySelector("#chart-viewer").src = line.toDataURL();
        document.querySelector("neo-printer").print();
    });

    function parse(str) {
        if (!str) return '""';
        str = String(str).replace(/"/g, `""`);
        if (/[",\n]/.test(str)) {
            str = `"${str}"`;
        }
        return str;
    }

    function resize() {
        Pie.style.width = "100%";
        Pie.style.height = "100%";
        Line.style.width = "100%";
        Line.style.height = "100%";
    }

    const csv = [
        ["", ...data[0]],
        [Neo.Helper.trans("Profit"), ...data[1]],
        [Neo.Helper.trans("Charges"), ...data[2]]
    ].map(e => e.map(c => parse(typeof c === "number" ? Neo.Helper.Str.money(c) : c)).join(',')).join("\n");
    document.querySelector("#download").href = URL.createObjectURL(new Blob([csv], {
        type: "text/csv",
    }));

    window.addEventListener("resize", resize);
    document.querySelector("#trigger").addEventListener("click", e => {
        setTimeout(() => resize(), 250);
    });
}