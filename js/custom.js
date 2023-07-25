function redirectToOrderPage() {
    window.location.href = "order.html";
}

function showMessage() {
    alert("Added successfully");
}

var params = {};
location.search.slice(1).split("&").forEach(function(pair) {
    pair = pair.split("=");
    params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
});

const Data = [
    {
        "item-no":'1',
        "item-name":"Dharwad Peda",
        "item-desc": "Rich milk-based sweet with khoya, sugar, and cardamom.",
        "item-price": "300",
        "item-image": "images/Dharwad_Peda.jpg"
    },
    {
        "item-no":'2',
        "item-name":"Kozhukatta",
        "item-desc": "Dumplings filled with grated coconut and jaggery.",
        "item-price": "250",
        "item-image": "images/Kozhukatta-2B.jpg"
    },
    {
        "item-no":'3',
        "item-name":"Rava Unde",
        "item-desc": "Sweet spheres made with semolina, ghee, sugar, and nuts.",
        "item-price": "100",
        "item-image": "images/Rava-Laddoo.jpg"
    },
    {
        "item-no":'4',
        "item-name":"Unniyappam",
        "item-desc": "Banana fritters with rice flour, jaggery, and coconut.",
        "item-price": "300",
        "item-image": "images/unniyappam.jpg"
    },
    {
        "item-no":'5',
        "item-name":"Badam Payasam",
        "item-desc": "Creamy almond pudding with milk, rice, and saffron.",
        "item-price": "350",
        "item-image": "images/Badam-Payasam.jpg"
    },
    {
        "item-no":'6',
        "item-name":"Pal Payasam",
        "item-desc": "Traditional rice pudding prepared with milk and sugar.",
        "item-price": "300",
        "item-image": "images/Pal_Payasam.jpg"
    },
    {
        "item-no":'7',
        "item-name":"Pumpkin Payasam",
        "item-desc": "A unique sweet treat blending pumpkin, jaggery, and coconut milk.",
        "item-price": "300",
        "item-image": "images/pumpkin-payasam.jpg"
    },
    {
        "item-no":'8',
        "item-name":"Mysore Pak",
        "item-desc": "Decadent dessert featuring ghee, chickpea flour, and sugar.",
        "item-price": "600",
        "item-image": "images/Mysore_Pak.png"
    },
    {
        "item-no":'9',
        "item-name":"Chiroti",
        "item-desc": "Crispy, flaky pastry made with refined flour, ghee, and powdered sugar.",
        "item-price": "300",
        "item-image": "images/Chiroti.jpg"
    },
    {
        "item-no":'10',
        "item-name":"Kozhikodan Halwa",
        "item-desc": "Semolina-based delight with ghee, cashews, raisins, and sugar.",
        "item-price": "300",
        "item-image": "images/halwa-kerala.avif"
    },
    {
        "item-no":'11',
        "item-name":"Belagavi Kunda",
        "item-desc": "Milk-based sweet delicacy with caramelized milk solids.",
        "item-price": "300",
        "item-image": "images/Belegavi_Style_Kunda.jpg"
    },
    {
        "item-no":'12',
        "item-name":"Kajjaaya",
        "item-desc": "Deep-fried sweets made from jaggery, rice flour, and cardamom.",
        "item-price": "300",
        "item-image": "images/Kajjaaya.png"
    }
]

var description = Data[params['item-no']-1]['item-desc'];
var item_name = Data[params['item-no']-1]['item-name'];
var img_src = Data[params['item-no']-1]['item-image'];

// Function to create and add the menu item HTML to the document
function createMenuItem() {
    // Create a div element with class "menu-item"
    var menuDiv = document.createElement('div');
    menuDiv.classList.add('menu-item');

    // Create an h2 element with id "item-name" and set its text content
    var itemName = document.createElement('h2');
    itemName.id = 'item-name';
    itemName.textContent = item_name;
    itemName.style.fontFamily= '"Playfair Display", serif';
    itemName.style.textTransform= 'uppercase';
    itemName.style.color= 'rgb(2, 2, 2)';
    itemName.style.backgroundColor= 'white';
    itemName.style.borderRadius= '5% 5%';
    
    
    //itemName.style.textAlign = 'center';
    menuDiv.appendChild(itemName);
    
    
    
    // Create the image element
    var imgElement = document.createElement('img');
    
    // Set the src and alt attributes
    imgElement.src = img_src;
    imgElement.alt = 'Menu Item';
    imgElement.style.width = '50%';
    imgElement.style.borderRadius = '25%';
    imgElement.style.borderColor= 'white';
    imgElement.style.boxShadow='0 2px 4px rgba(0, 0, 0, 0.3)';
    imgElement.style.display = 'block';
    imgElement.style.margin = '0 auto';
    
    
    // Add the image element to the document body
    menuDiv.appendChild(imgElement);
    
    // Create a p element for description and set its text content
    var itemDescription = document.createElement('p');
    itemDescription.innerHTML = '<span id="item-description">'+description+'</span>';
    // itemDescription.style.textAlign = 
    itemDescription.style.fontStyle= 'italic';
    itemDescription.style.margin = '20px';
    itemDescription.style.fontFamily = '"Playfair Display", serif';
    itemDescription.style.backgroundColor = 'white';
    menuDiv.appendChild(itemDescription);
    
    // Create a p element for price and set its text content
    var itemPrice = document.createElement('p');
    itemPrice.innerHTML = 'Price: Rs. <span id="item-price">0</span>';
    itemPrice.style.fontFamily = '"Playfair Display", serif';
    itemPrice.style.color = 'black';

    menuDiv.appendChild(itemPrice);

    // Create labels and radio buttons for size
    var sizeLabel = document.createElement('label');
    sizeLabel.htmlFor = 'size';
    sizeLabel.textContent = 'Size:';
    sizeLabel.style.fontFamily= '"Arial", sans-serif';
    sizeLabel.style.fontSize= '17px';
    menuDiv.appendChild(sizeLabel);
    
    var regularRadio = document.createElement('input');
    regularRadio.type = 'radio';
    regularRadio.name = 'size';
    regularRadio.style.fontFamily= '"Arial", sans-serif';
    regularRadio.value = 'Regular';
    regularRadio.checked = true;
    menuDiv.appendChild(regularRadio);
    menuDiv.appendChild(document.createTextNode('Regular'));
    
    var largeRadio = document.createElement('input');
    largeRadio.type = 'radio';
    largeRadio.name = 'size';
    largeRadio.value = 'Large';
    largeRadio.style.fontFamily= '"Arial", sans-serif';
    menuDiv.appendChild(largeRadio);
    menuDiv.appendChild(document.createTextNode('Large'));
    
    
    var lineBreak = document.createElement('p');
    menuDiv.appendChild(lineBreak);
    // Create labels and input field for quantity
    var quantityLabel = document.createElement('label');
    quantityLabel.htmlFor = 'quantity';
    quantityLabel.textContent = 'Quantity:';
    quantityLabel.style.fontFamily= '"Arial", sans-serif';
    menuDiv.appendChild(quantityLabel);
    
    var quantityInput = document.createElement('input');
    quantityInput.type = 'number';
    quantityInput.name = 'quantity';
    quantityInput.value = '1';
    menuDiv.appendChild(quantityInput);

    // Create a div with class "row" and "col-md-4 col-md-offset-4 text-center to-animate-2"
    var rowDiv = document.createElement('div');
    rowDiv.classList.add('row');
    var colDiv = document.createElement('div');
    colDiv.classList.add('col-md-4', 'col-md-offset-4', 'text-center', 'to-animate-2');

    
    // Create a button with class "btn" and onclick attribute
    var addToCartButton = document.createElement('button');
    addToCartButton.classList.add('btn');
    addToCartButton.textContent = 'Place order';
    addToCartButton.onclick = showMessage;
    addToCartButton.style.padding = '5px 22px';
    addToCartButton.style.margin = '20px';
    addToCartButton.style.borderColor = 'white';
    addToCartButton.style.color = 'black';
    addToCartButton.style.fontFamily= '"Arial", sans-serif';
    addToCartButton.style.backgroundColor = 'white';
    // addToCartButton.style.borderColor = 'white';

    colDiv.appendChild(addToCartButton);
    rowDiv.appendChild(colDiv);
    menuDiv.appendChild(rowDiv);

    // Add the menuDiv to the document body
    document.body.appendChild(menuDiv);
}

// Function to handle button click event
function showMessage() {
    alert('Successfully Placed Order!');
}
