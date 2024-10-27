import { createSlice } from '@reduxjs/toolkit';

export const cartSlice = createSlice({
    name: 'cart',
    initialState: {
        items: [],
    },
    reducers: {
        addToCart: (state, action) => {
            const existingIndex = state.items.findIndex(item => item.id === action.payload.id);

            if (existingIndex >= 0) {
                // If the item exists, update the quantity
                state.items[existingIndex].quantity += action.payload.quantity;
            } else {
                // If the item doesn't exist, add it to the cart with its quantity
                state.items.push({ ...action.payload, quantity: action.payload.quantity });
            }
        },
        removeFromCart: (state, action) => {
            state.items = state.items.filter(item => item.id !== action.payload);
        },

        updateQuantity: (state, action) => {
            const index = state.items.findIndex(item => item.id === action.payload.id);
            if (index >= 0 && action.payload.quantity > 0) {
                // Update the quantity of the item
                state.items[index].quantity = action.payload.quantity;
            } else if (index >= 0 && action.payload.quantity <= 0) {
                // Remove the item if the quantity is 0 or less
                state.items.splice(index, 1);
            }
        },
    },
});

export const { addToCart, removeFromCart, updateQuantity } = cartSlice.actions;

export default cartSlice.reducer;
