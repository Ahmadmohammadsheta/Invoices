// 1- urls & routs
$.ajax({
    url: "/customers", // working in file.js in public folder
    url: "{{ route('customers.store') }}", // working in file.blade in resources folder
    type:"POST",
    data: $(this).serialize(),
    success: function(response) {
    },
    error: function(error) {
    }
});
