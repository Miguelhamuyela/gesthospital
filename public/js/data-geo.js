const ProvinceAndCounty = [
    {
        /* Bengo */
        P1: [
            "Ambriz",
            "Bula Atumba",
            "Dande",
            "Dembos",
            "Nambuangongo",
            "Pango Aluquém",
        ],
        /* Benguela */
        P2: [
            "Balombo",
            "Baía Farta",
            "Benguela",
            "Bocoio",
            "Caimbambo",
            "Catumbela",
            "Chongoroi",
            "Cubal",
            "Ganda",
            "Lobito",
        ],
        /* Bié */
        P3: [
            "Andulo",
            "Camacupa",
            "Catabola",
            "Chinguar",
            "Chitembo",
            "Cuemba",
            "Cunhinga",
            "Cuíto",
            "Nharea",
        ],
        /* Cabinda */
        P4: ["Belize", "Buco-Zau", "Cabinda", "Cacongo"],
        /* Cuando Cubango */
        P5: [
            "Calai",
            "Cuangar",
            "Cuchi",
            "Cuito Cuanavale",
            "Dirico",
            "Mavinga",
            "Menongue",
            "Nancova",
            "Rivungo",
        ],
        //Cuanza Norte
        P6: [
            "Ambaca",
            "Banga",
            "Bolongongo",
            "Cambambe",
            "Cazengo",
            "Golungo Alto",
            "Gonguembo",
            "Lucala",
            "Quiculungo",
            "Samba Cajú",
            "Ndalatando",
        ],

        //Cuanza Sul
        P7: [
            "Gabela",
            "Cassongue",
            "Cela",
            "Conda",
            "Ebo",
            "Libolo",
            "Mussende",
            "Porto Amboim",
            "Quilenda",
            "Quibala",
            "Seles",
            "Sumbe",
        ],
        //Cunene
        P8: ["Cahama", "Cuanhama", "Curoca", "Cuvelai", "Namacunde", "Ombadja"],
        //Huambo
        P9: [
            "Bailundo",
            "Cachiungo",
            "Caála",
            "Ecunha",
            "Huambo",
            "Londuimbali",
            "Longonjo",
            "Mungo",
            "Chicala-Choloanga",
            "Chinjenje",
            "Ucuma",
        ],
        //Huila
        P10: [
            "Caconda",
            "Cacula",
            "Caluquembe",
            "Gambos",
            "Chibia",
            "Chicomba",
            "Chipindo",
            "Cuvango",
            "Humpata",
            "Jamba",
            "Lubango",
            "Matala",
            "Quilengues",
            "Quipungo",
        ],
        //Luanda
        P11: [
            "Belas",
            "Cacuaco",
            "Cazenga",
            "Icolo-e-Bengo",
            "Luanda",
            "Kilamba Kiaxi",
            "Quiçama",
            "Talatona",
            "Viana",
        ],
        //Lunda-Norte
        P12: [
            "Cambulo",
            "Capenda-Camulemba",
            "Caungula",
            "Chitato",
            "Cuango",
            "Cuílo",
            "Lóvua",
            "Lubalo",
            "Lucapa",
            "Xá-Muteba",
        ],
        //Lunda-Sul
        P13: ["Cacolo", "Dala", "Muconda", "Saurimo"],
        //Malanje
        P14: [
            "Cacuso",
            "Calandula",
            "Cambundi-Catembo",
            "Cangandala",
            "Caombo",
            "Cuaba Nzogo",
            "Cunda-Dia-Baze",
            "Malanje",
            "Marimba",
            "Massango",
            "Mucari",
            "Quela",
            "Quirima",
            "Luquembo",
        ],
        //Moxico
        P15: [
            "Alto Zambeze",
            "Bundas",
            "Camanongue",
            "Léua",
            "Luacano",
            "Moxico",
            "Luchazes",
            "Luau",
            "Cameia",
        ],
        //Namibe
        P16: ["Bibala", "Camucuio", "Moçâmedes", "Tômbua", "Virei"],
        //Uige
        P17: [
            "Uíge",
            "Alto Cauale",
            "Ambuíla",
            "Bembe",
            "Buengas",
            "Bungo",
            "Milunga",
            "Damba",
            "Maquela do Zombo",
            "Mucaba",
            "Negage",
            "Puri",
            "Quimbele",
            "Quitexe",
            "Sanza Pombo",
            "Songo",
        ],
        //Zaire
        P18: ["Cuimba", "Mbanza Congo", "Nóqui", "Nzeto", "Soyo", "Tomboco"],
    },
];

const province_id = document.querySelector("#province_id");
const county = document.querySelector("#county");
const wrapperCounty = document.querySelector("#wrapper-county");

const removeChild = (el) => {
    while (el.firstChild) {
        el.removeChild(el.firstChild);
    }
};

const hideElement = (el) => (el.style.display = "disabled");

const showElement = (el) => (el.style.display = "");

hideElement(wrapperCounty); /*
<option value="" disabled> Selecione um município</option> */
province_id.addEventListener("change", (e) => {
    showElement(wrapperCounty);
    removeChild(county);
    const option = document.createElement("option");
    const value = (option.text = "Selecione o Munícipio");
    const disabled = (option.disabled = true);
    const selected = (option.selected = true);

    county.add(option);
    if (e.target.value === province_id.value) {
        ProvinceAndCounty.map((data) => {
            data[e.target.value].map((city) => {
                const option = document.createElement("option");
                const value = (option.text = city);
                county.add(option);
            });
        });
    }
});
