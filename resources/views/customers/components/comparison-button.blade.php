<!-- Product Comparison Button -->
<button class="btn btn-ghost btn-sm gap-1 comparison-btn" onclick="addToComparison('{{ $product->_id ?? $product->id }}', '{{ $product->name }}')">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
    </svg>
    {{ __('messages.compare.add') }}
</button>

<script>
function addToComparison(productId, productName) {
    const url = `/so-sanh/${productId}`;
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            const alertEl = document.createElement('div');
            alertEl.className = 'alert alert-success fixed top-4 right-4 max-w-xs z-50';
            alertEl.innerHTML = `
                <svg class="stroke-current shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h3 class="font-bold">${productName}</h3>
                    <div class="text-xs">${data.message}</div>
                </div>
                <button onclick="this.parentElement.remove()" class="btn btn-sm">✕</button>
            `;
            document.body.appendChild(alertEl);
            setTimeout(() => alertEl.remove(), 3000);

            // Update comparison button
            updateComparisonButton(productId);
        } else {
            // Show error message
            const alertEl = document.createElement('div');
            alertEl.className = 'alert alert-error fixed top-4 right-4 max-w-xs z-50';
            alertEl.innerHTML = `
                <svg class="stroke-current shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l-2-2m0 0l-2-2m2 2l2-2m-2 2l-2 2m10-10l-2 2m0 0l-2-2m2 2l2-2m-2 2l-2 2"></path></svg>
                <div>
                    <h3 class="font-bold">Lỗi</h3>
                    <div class="text-xs">${data.message}</div>
                </div>
                <button onclick="this.parentElement.remove()" class="btn btn-sm">✕</button>
            `;
            document.body.appendChild(alertEl);
            setTimeout(() => alertEl.remove(), 3000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function updateComparisonButton(productId) {
    fetch(`{{ route('comparison.count') }}`)
        .then(response => response.json())
        .then(data => {
            // You could update comparison badge here if you have one
        });
}
</script>
