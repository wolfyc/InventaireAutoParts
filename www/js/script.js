<script>
document.addEventListener('DOMContentLoaded', function() {
    let itemIndex = 1;
    const orderItems = document.getElementById('orderItems');

    // Function to add a new item field
    function addItem() {
        const newItem = document.createElement('div');
        newItem.className = 'item';
        newItem.innerHTML = `
            <label>ID Pièce:</label>
            <input type="number" name="items[${itemIndex}][idPiece]" required><br>
            <label>Quantité:</label>
            <input type="number" name="items[${itemIndex}][quantite]" required><br>
            <label>Prix Unitaire:</label>
            <input type="number" name="items[${itemIndex}][prixUnitaire]" step="0.01" required><br>
        `;
        orderItems.appendChild(newItem);
        itemIndex++;
    }

    // Example: Add a button to add new item fields
    const addItemButton = document.createElement('button');
    addItemButton.textContent = 'Ajouter un Article';
    addItemButton.type = 'button';
    addItemButton.onclick = addItem;
    orderItems.appendChild(addItemButton);
});
</script>
