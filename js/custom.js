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
        "item-desc": "Rich milk-based sweet <br> with khoya, sugar, and cardamom.",
        "item-price": "300"
    },
    {
        "item-no":'2',
        "item-name":"Kozhukatta",
        "item-desc": "Dumplings filled with grated coconut and jaggery.",
        "item-price": "250"
    },
    {
        "item-no":'3',
        "item-name":"Rava Unde",
        "item-desc": "Sweet spheres made with semolina, ghee, sugar, and nuts.",
        "item-price": "100"
    },
    {
        "item-no":'4',
        "item-name":"Unniyappam",
        "item-desc": "Banana fritters with rice flour, jaggery, and coconut.",
        "item-price": "300"
    },
    {
        "item-no":'5',
        "item-name":"Badam Payasam",
        "item-desc": "Creamy almond pudding with milk, rice, and saffron.",
        "item-price": "350"
    },
    {
        "item-no":'6',
        "item-name":"Pal Payasam",
        "item-desc": "Traditional rice pudding prepared with milk and sugar.",
        "item-price": "300"
    },
    {
        "item-no":'7',
        "item-name":"Pumpkin Payasam",
        "item-desc": "A unique sweet treat blending pumpkin, jaggery, and coconut milk.",
        "item-price": "300"
    },
    {
        "item-no":'8',
        "item-name":"Mysore Pak",
        "item-desc": "Decadent dessert featuring ghee, chickpea flour, and sugar.",
        "item-price": "600"
    },
    {
        "item-no":'9',
        "item-name":"Chiroti",
        "item-desc": "Crispy, flaky pastry made with refined flour, ghee, and powdered sugar.",
        "item-price": "300"
    },
    {
        "item-no":'10',
        "item-name":"Kozhikodan Halwa",
        "item-desc": "Semolina-based delight with ghee, cashews, raisins, and sugar.",
        "item-price": "300"
    },
    {
        "item-no":'11',
        "item-name":"Belagavi Kunda",
        "item-desc": "Milk-based sweet delicacy with caramelized milk solids.",
        "item-price": "300"
    },
    {
        "item-no":'12',
        "item-name":"Kajjaaya",
        "item-desc": "Deep-fried sweets made from jaggery, rice flour, and cardamom.",
        "item-price": "300"
    }
]

var description = Data[params['item-no']-1]['item-desc'];
var item_name = Data[params['item-no']-1]['item-name'];


// Function to create and add the menu item HTML to the document
function createMenuItem() {
    // Create a div element with class "menu-item"
    var menuDiv = document.createElement('div');
    menuDiv.classList.add('menu-item');

    // Create an h2 element with id "item-name" and set its text content
    var itemName = document.createElement('h2');
    itemName.id = 'item-name';
    itemName.textContent = item_name;
    //itemName.style.textAlign = 'center';
    menuDiv.appendChild(itemName);



    // Create the image element
    var imgElement = document.createElement('img');
    
    // Set the src and alt attributes
    imgElement.src = 'images/Dharwad_Peda.jpg';
    imgElement.alt = 'Menu Item';
    imgElement.style.width = '50%';
    imgElement.style.borderRadius = '50%';
    imgElement.style.display = 'block';
    imgElement.style.margin = '0 auto';

    // Add the image element to the document body
    menuDiv.appendChild(imgElement);

    // Create a p element for description and set its text content
    var itemDescription = document.createElement('p');
    itemDescription.innerHTML = '<span id="item-description">'+description+'</span>';
    itemDescription.style.textAlign = 
    menuDiv.appendChild(itemDescription);

    // Create a p element for price and set its text content
    var itemPrice = document.createElement('p');
    itemPrice.innerHTML = 'Price: Rs. <span id="item-price">0</span>';
    menuDiv.appendChild(itemPrice);

    // Create labels and radio buttons for size
    var sizeLabel = document.createElement('label');
    sizeLabel.htmlFor = 'size';
    sizeLabel.textContent = 'Size:';
    menuDiv.appendChild(sizeLabel);

    var regularRadio = document.createElement('input');
    regularRadio.type = 'radio';
    regularRadio.name = 'size';
    regularRadio.value = 'Regular';
    regularRadio.checked = true;
    menuDiv.appendChild(regularRadio);
    menuDiv.appendChild(document.createTextNode('Regular'));
    
    var largeRadio = document.createElement('input');
    largeRadio.type = 'radio';
    largeRadio.name = 'size';
    largeRadio.value = 'Large';
    menuDiv.appendChild(largeRadio);
    menuDiv.appendChild(document.createTextNode('Large'));
    
    
    var lineBreak = document.createElement('p');
    menuDiv.appendChild(lineBreak);
    // Create labels and input field for quantity
    var quantityLabel = document.createElement('label');
    quantityLabel.htmlFor = 'quantity';
    quantityLabel.textContent = 'Quantity:';
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
    addToCartButton.textContent = 'Add to Cart';
    addToCartButton.onclick = showMessage;

    colDiv.appendChild(addToCartButton);
    rowDiv.appendChild(colDiv);
    menuDiv.appendChild(rowDiv);

    // Add the menuDiv to the document body
    document.body.appendChild(menuDiv);
}

// Function to handle button click event
function showMessage() {
    alert('Added to Cart!');
}
