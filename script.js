const hotelsData = {
    "Mumbai": [
        { name: "Hotel Taj Mahal", image: "https://static.toiimg.com/thumb/96586810/Taj-Mahal-Palace-hotel-in-Mumbai.jpg?width=1200&height=900", link: "taj_mahal.html" },
        { name: "The Oberoi", image: "https://rukmini-ct.flixcart.com/q_75,w_420,h_300,fl_progressive,e_sharpen:80,c_fill,dpr_2,f_auto/ct-hotel-images/places/hotels/cms/3752/375279/images/a507836d_z.jpg", link: "the_oberoi.html" },
        { name: "Trident Hotel", image: "https://cf.bstatic.com/xdata/images/hotel/max1024x768/33561482.jpg?k=d203588805f9313f436542d46eccb9436fd8aca92fb45614c7730d5c541020d7&o=&hp=1", link: "trident_hotel.html" }
    ],
    "Delhi": [
        { name: "The Leela Palace", image: "https://imgcld.yatra.com/ytimages/image/upload/t_seo_Hotel_w_930_h_550_c_fill_g_auto_q_40_f_jpg/v1405423971/Domestic%20Hotels/Hotels_New%20Delhi/The%20Leela%20Palace%20New%20Delhi/Overview.jpg", link: "leela_palace.html" },
        { name: "Taj Palace", image: "https://imgcy.trivago.com/c_fill,d_dummy.jpeg,e_sharpen:60,f_auto,h_534,q_40,w_800/hotelier-images/5e/e3/60a71e9f6c4258a5e527ee065af08c5c2ba76d1ca6c28dc38ac807490a30.jpeg", link: "taj_palace.html" },
        { name: "The Lodhi", image: "https://www.theluxevoyager.com/wp-content/uploads/2019/04/The-Lodhi-Hotel-New-Delhi-Indian-Accent-Restaurant.jpg", link: "the_lodhi.html" }
    ],
    "Bangalore": [
        { name: "The Ritz-Carlton", image: "https://i1.wp.com/theluxuryeditor.com/wp-content/uploads/2020/01/198589995.jpg?fit=1280%2C853&ssl=1", link: "ritz_carlton.html" },
        { name: "ITC Gardenia", image: "https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2017/10/09/1703/Grand-Hyatt-Doha-Hotel-and-Villas-P381-Exterior-Facade.jpg/Grand-Hyatt-Doha-Hotel-and-Villas-P381-Exterior-Facade.16x9.jpg", link: "itc_gardenia.html" },
        { name: "Sheraton Grand", image: "https://media.holidaycheck.com/images/e1ff8025-cd28-343d-addd-bbddf61a7e12", link: "sheraton_grand.html" }
    ],
    "Hyderabad": [
        { name: "Novotel Hyderabad", image: "https://cdn.audleytravel.com/2100/1500/79/540267-pool-loews-hotel-santa-monica-los-angeles.jpg", link: "novotel_hyderabad.html" },
        { name: "Taj Krishna", image: "http://1.bp.blogspot.com/-olV6b_sXfcs/UB9n8REKJyI/AAAAAAAABJo/uhicgM4kxTU/s1600/atlantis,+the+palm-southview_.jpg", link: "taj_krishna.html" },
        { name: "ITC Kakatiya", image: "https://www.fodors.com/wp-content/uploads/2022/10/Aramness_120.jpeg", link: "itc_kakatiya.html" }
    ],
    "Ahmedabad": [
        { name: "Hyatt Regency", image: "https://www.tripsavvy.com/thmb/cDvF7_FFQFLVUfUBEVmRy9DRrHE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/luxe-sea-view-f49a9d6ccc97437493b87b481a2f4ed4.jpeg", link: "hyatt_regency.html" },
        { name: "Courtyard by Marriott", image: "https://a.cdn-hotels.com/gdcs/production189/d649/12939b60-4bee-4b2e-916f-ce4738351a3d.jpg", link: "courtyard_marriott.html" },
        { name: "Radisson Blu", image: "https://cache.marriott.com/marriottassets/marriott/ROMDT/romdt-exterior-0009-hor-feat.jpg", link: "radisson_blu.html" }
    ],
    "Chennai": [
        { name: "Park Hyatt Chennai", image: "https://luxus-plus.com/wp-content/uploads/2020/09/Accra-Marriott-Hotel.jpg", link: "park_hyatt.html" },
        { name: "ITC Grand Chola", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "itc_grand_chola.html" },
        { name: "The Leela Palace", image: "https://images.travelandleisureasia.com/wp-content/uploads/sites/2/2022/11/13182005/ITC-maurya-1600x900.jpg", link: "leela_palace_chennai.html" }
    ],
    "Kolkata": [
        { name: "Taj Bengal", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "taj_bengal.html" },
        { name: "The Oberoi Grand", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "oberoi_grand.html" },
        { name: "JW Marriott Kolkata", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "jw_marriott_kolkata.html" }
    ],
    "Surat": [
        { name: "The Grand Bhagwati", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "grand_bhagwati.html" },
        { name: "Lords Plaza", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "lords_plaza.html" },
        { name: "Hotel Orange", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "hotel_orange.html" }
    ],
    "Pune": [
        { name: "JW Marriott Pune", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "jw_marriott_pune.html" },
        { name: "Hyatt Pune", image: "https://cache.marriott.com/marriottassets/marriott/ROMDT/romdt-exterior-0009-hor-feat.jpg", link: "hyatt_pune.html" },
        { name: "The Westin Pune", image: "https://a.cdn-hotels.com/gdcs/production189/d649/12939b60-4bee-4b2e-916f-ce4738351a3d.jpg", link: "westin_pune.html" }
    ],
    "Jaipur": [
        { name: "Rambagh Palace", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "rambagh_palace.html" },
        { name: "ITC Rajputana", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "itc_rajputana.html" },
        { name: "Fairmont Jaipur", image: "https://www.oyster.com/wp-content/uploads/sites/35/2019/05/pool-v13739585-1440.jpg", link: "fairmont_jaipur.html" }
    ],
    "Lucknow": [
        { name: "Hyatt Regency Lucknow", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "hyatt_regency_lucknow.html" },
        { name: "Vivanta Lucknow", image: "https://www.hilton.com/im/en/DALLFES/10682645/dallfes-exterior-8585-no-lights-300.jpg?impolicy=crop&cw=5355&ch=3012&gravity=NorthWest&xposition=0&yposition=278&rw=1214&rh=683", link: "vivanta_lucknow.html" },
        { name: "The Piccadily", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "piccadily.html" }
    ],
    "Kanpur": [
        { name: "Taj Bengal", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "taj_bengal.html" },
        { name: "The Oberoi Grand", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "oberoi_grand.html" },
        { name: "JW Marriott Kolkata", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "jw_marriott_kolkata.html" }
    ],
    "Nagpur": [
        { name: "The Grand Bhagwati", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "grand_bhagwati.html" },
        { name: "Lords Plaza", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "lords_plaza.html" },
        { name: "Hotel Orange", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "hotel_orange.html" }
    ],
    "Indore": [
        { name: "JW Marriott Pune", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "jw_marriott_pune.html" },
        { name: "Hyatt Pune", image: "https://cache.marriott.com/marriottassets/marriott/ROMDT/romdt-exterior-0009-hor-feat.jpg", link: "hyatt_pune.html" },
        { name: "The Westin Pune", image: "https://a.cdn-hotels.com/gdcs/production189/d649/12939b60-4bee-4b2e-916f-ce4738351a3d.jpg", link: "westin_pune.html" }
    ],
    "Thane": [
        { name: "Rambagh Palace", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "rambagh_palace.html" },
        { name: "ITC Rajputana", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "itc_rajputana.html" },
        { name: "Fairmont Jaipur", image: "https://www.oyster.com/wp-content/uploads/sites/35/2019/05/pool-v13739585-1440.jpg", link: "fairmont_jaipur.html" }
    ],
    "Bhopal": [
        { name: "Hyatt Regency Lucknow", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "hyatt_regency_lucknow.html" },
        { name: "Vivanta Lucknow", image: "https://www.hilton.com/im/en/DALLFES/10682645/dallfes-exterior-8585-no-lights-300.jpg?impolicy=crop&cw=5355&ch=3012&gravity=NorthWest&xposition=0&yposition=278&rw=1214&rh=683", link: "vivanta_lucknow.html" },
        { name: "The Piccadily", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "piccadily.html" }
    ],
    
    "Visakhapatnam": [
        { name: "Novotel Hyderabad", image: "https://cdn.audleytravel.com/2100/1500/79/540267-pool-loews-hotel-santa-monica-los-angeles.jpg", link: "novotel_hyderabad.html" },
        { name: "Taj Krishna", image: "http://1.bp.blogspot.com/-olV6b_sXfcs/UB9n8REKJyI/AAAAAAAABJo/uhicgM4kxTU/s1600/atlantis,+the+palm-southview_.jpg", link: "taj_krishna.html" },
        { name: "ITC Kakatiya", image: "https://www.fodors.com/wp-content/uploads/2022/10/Aramness_120.jpeg", link: "itc_kakatiya.html" }
    ],
    "Pimpri-Chinchwad": [
        { name: "Hyatt Regency", image: "https://www.tripsavvy.com/thmb/cDvF7_FFQFLVUfUBEVmRy9DRrHE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/luxe-sea-view-f49a9d6ccc97437493b87b481a2f4ed4.jpeg", link: "hyatt_regency.html" },
        { name: "Courtyard by Marriott", image: "https://a.cdn-hotels.com/gdcs/production189/d649/12939b60-4bee-4b2e-916f-ce4738351a3d.jpg", link: "courtyard_marriott.html" },
        { name: "Radisson Blu", image: "https://cache.marriott.com/marriottassets/marriott/ROMDT/romdt-exterior-0009-hor-feat.jpg", link: "radisson_blu.html" }
    ],
    "Patna": [
        { name: "Park Hyatt Chennai", image: "https://luxus-plus.com/wp-content/uploads/2020/09/Accra-Marriott-Hotel.jpg", link: "park_hyatt.html" },
        { name: "ITC Grand Chola", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "itc_grand_chola.html" },
        { name: "The Leela Palace", image: "https://images.travelandleisureasia.com/wp-content/uploads/sites/2/2022/11/13182005/ITC-maurya-1600x900.jpg", link: "leela_palace_chennai.html" }
    ],
    "Vadodara": [
        { name: "Taj Bengal", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "taj_bengal.html" },
        { name: "The Oberoi Grand", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "oberoi_grand.html" },
        { name: "JW Marriott Kolkata", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "jw_marriott_kolkata.html" }
    ],
    "Ghaziabad": [
        { name: "The Grand Bhagwati", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "grand_bhagwati.html" },
        { name: "Lords Plaza", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "lords_plaza.html" },
        { name: "Hotel Orange", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "hotel_orange.html" }
    ],
    "Ludhiana": [
        { name: "JW Marriott Pune", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "jw_marriott_pune.html" },
        { name: "Hyatt Pune", image: "https://cache.marriott.com/marriottassets/marriott/ROMDT/romdt-exterior-0009-hor-feat.jpg", link: "hyatt_pune.html" },
        { name: "The Westin Pune", image: "https://a.cdn-hotels.com/gdcs/production189/d649/12939b60-4bee-4b2e-916f-ce4738351a3d.jpg", link: "westin_pune.html" }
    ],
    "Agra": [
        { name: "Rambagh Palace", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "rambagh_palace.html" },
        { name: "ITC Rajputana", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "itc_rajputana.html" },
        { name: "Fairmont Jaipur", image: "https://www.oyster.com/wp-content/uploads/sites/35/2019/05/pool-v13739585-1440.jpg", link: "fairmont_jaipur.html" }
    ],
    "Nashik": [
        { name: "Hyatt Regency Lucknow", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "hyatt_regency_lucknow.html" },
        { name: "Vivanta Lucknow", image: "https://www.hilton.com/im/en/DALLFES/10682645/dallfes-exterior-8585-no-lights-300.jpg?impolicy=crop&cw=5355&ch=3012&gravity=NorthWest&xposition=0&yposition=278&rw=1214&rh=683", link: "vivanta_lucknow.html" },
        { name: "The Piccadily", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "piccadily.html" }
    ],
    "Faridabad": [
        { name: "Taj Bengal", image: "https://media.disneylandparis.com/d4th/en-gb/images/n015655_2_2027sep30_world_newport-bay-club-hotel-by-night_16-9_tcm752-179399.jpg", link: "taj_bengal.html" },
        { name: "The Oberoi Grand", image: "https://www.cktravels.com/wp-content/uploads/2023/01/ao-nang-beach-resorts.jpg", link: "oberoi_grand.html" },
        { name: "JW Marriott Kolkata", image: "https://kimandcarrie.com/wp-content/uploads/2022/03/Universal-Orlando-Aventura-Hotel.jpg", link: "jw_marriott_kolkata.html" }
    ],
    "Meerut": [
        { name: "The Grand Bhagwati", image: "http://www.new-delhi-hotels.com/blog/wp-content/uploads/2012/12/hotel-Claridges-New-Delhi.jpg", link: "grand_bhagwati.html" },
        { name: "Lords Plaza", image: "https://tse2.mm.bing.net/th?id=OIP.jFJVm2i72JQy43cQAAxpAwHaEK&pid=Api&P=0&h=180", link: "lords_plaza.html" },
        { name: "Hotel Orange", image: "https://www.flyinghighonpoints.com/wp-content/uploads/2019/11/ic-alliance-resorts-las-vegas-5529047952-2x1-1.jpg", link: "hotel_orange.html" }
    ]
    
    // Repeat similar structure for other cities like Kanpur, Nagpur, Indore, etc.
};

// Function to display hotels for the selected city
function showHotels(city) {
    const hotelList = document.getElementById("hotel-list");
    const selectedCity = document.getElementById("selected-city");

    // Set the selected city title
    selectedCity.textContent = city;

    // Clear previous hotel list
    hotelList.innerHTML = "";

    // Add hotels for the selected city
    hotelsData[city].forEach(hotel => {
        const hotelCard = document.createElement("div");
        hotelCard.className = "hotel-card";

        // Create a clickable link for each hotel
        const hotelLink = document.createElement("a");
        hotelLink.href = hotel.link;

        // Hotel image
        const hotelImage = document.createElement("img");
        hotelImage.src = hotel.image;
        hotelImage.alt = hotel.name;
        hotelLink.appendChild(hotelImage);

        // Hotel name
        const hotelName = document.createElement("h3");
        hotelName.textContent = hotel.name;
        hotelLink.appendChild(hotelName);

        // Append link to the card and the card to the hotel list
        hotelCard.appendChild(hotelLink);
        hotelList.appendChild(hotelCard);
    });
}