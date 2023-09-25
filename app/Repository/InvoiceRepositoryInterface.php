<?php
namespace App\Repository;

use App\Models\Invoice;

interface InvoiceRepositoryInterface {

   /**
    * @param array $attributes
    *
    * @return Invoice
    */
    public function createInvoice(array $attributes): Invoice;

    /**
     * @param id $attributes
     * @return Model
     */
    public function editInvoice($id, array $attributes);

    /**
     * @param id $attributes
     * @return Model
     */
    public function deleteInvoice($id): ?Invoice;
}
