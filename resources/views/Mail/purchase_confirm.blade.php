    <h1>You have purchased some products from <strong>Ironman</strong>...Here is your purchase details </h1>

    <div class="edit-mode-wrap" id="editor">
                <div id="templateArea"><style type="text/css">* { margin:0; padding:0; }
    body { background:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:20px; }
    #extra {text-align: right; font-size: 22px;  font-weight: 700}
    .invoice-wrap { width:700px; margin:0 auto; background:#FFF; color:#000 }
    .invoice-inner { margin:0 15px; padding:20px 0 }
    .invoice-address { border-top: 3px double #000000; margin: 25px 0; padding-top: 25px; }
    .bussines-name { font-size:18px; font-weight:100 }
    .invoice-name { font-size:22px; font-weight:700 }
    .listing-table th { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; text-align:left; padding:6px 4px }
    .listing-table td { border-bottom: 1px solid #555555; text-align:left; padding:5px 6px; vertical-align:top }
    .total-table td { border-left: 1px solid #555555; }
    .total-row { background-color: #e5e5e5; border-bottom: 1px solid #555555; border-top: 1px solid #555555; font-weight: bold; }
    .row-items { margin:5px 0; display:block }
    .notes-block { margin:50px 0 0 0 }
    /*tables*/
    table td { vertical-align:top}
    .items-table { border:1px solid #1px solid #555555; border-collapse:collapse; width:100%>
    .items-table td, .items-table th { border:1px solid #555555; padding:4px 5px ; text-align:left}
    .items-table th { background:#f5f5f5;}
    .totals-row .wide-cell { border:1px solid #fff; border-right:1px solid #555555; border-top:1px solid #555555}
    </style>
    <div class="invoice-wrap">
    <div class="invoice-inner">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="left" class="is_logo" valign="top"><div id="logoDiv"><img class="" height="102" id="logo" src="https://create.onlineinvoices.com/img/uploads/logos/default-logo.png" width="122" style="width: 122px; height: 102px;" data-original-title="" title=""></div></td>
                <td align="right" valign="top">
                <div class="business_info">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td><textarea id="business_info" rows="7" class="invoice-input" style="display: none; overflow: hidden; overflow-wrap: break-word; resize: none; height: 140px;"></textarea><div class="reset_editor invoice-input mce-content-body" id="business_info_editor" style="width: 255px; min-height: 80px; position: relative;" contenteditable="true" spellcheck="false"><p style="font-size: 14pt;" data-mce-style="font-size: 14pt;">[Business Name]</p><p>[Business Address 1]<br> [City], [State] [Postal Code]<br> <br> [Business Phone Number]<br> [Business Email Address]</p></div></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </td>
                <td align="right" valign="top">
                <input type="text" id="extra" value="Invoice" class="invoice-input" style="text-align: right; display: none;"><div class="reset_editor invoice-input mce-content-body" id="extra_editor" style="width: 200px; min-height: 26px; position: relative;" contenteditable="true" spellcheck="false"><p><span style="font-size: 18pt;" data-mce-style="font-size: 18pt;">Invoice</span></p></div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="invoice-address">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td align="left" valign="top" width="50%">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="" valign="top" width=""><strong><input type="text" id="label_bill_to" value="Bill To" class="invoice-input" style="font-weight: bold;"></strong></td>
                            <td valign="top">
                            <div class="client_info">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="padding-left:25px;"><textarea id="client_info" rows="4" class="invoice-input" style="display: none; overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea><div class="reset_editor invoice-input mce-content-body" id="client_info_editor" contenteditable="true" style="width: 200px; min-height: 80px; position: relative;" spellcheck="false"><p>[Client Name ]<br> [Client Address line 1]<br> [City], [State] [Postal code]</p></div></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </td>
                <td align="right" valign="top" width="50%">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="right"><strong><input type="text" id="label_invoice_no" value="Invoice Number" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px"><input type="text" id="no" value="2001321" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <tr>
                            <td align="right"><strong><input type="text" id="label_date" value="Date" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px"><input type="text" id="date" value="7/24/2020" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- Fieldl-->
                        <tr class="field1_row">
                            <td align="right"><strong><input type="text" id="label_field1" value="Terms" class="invoice-input" placeholder="[ADD MORE]" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field1_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Fieldl--><!-- Field2-->
                        <tr class="field2_row" style="display: table-row;">
                            <td align="right"><strong><input type="text" id="label_field2" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field2_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field2--><!-- Field3-->
                        <tr class="field3_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field3" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field3_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field3--><!-- Field4-->
                        <tr class="field4_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field4" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field4_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field4--><!-- Field5-->
                        <tr class="field5_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field5" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field5_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field5--><!-- Field6-->
                        <tr class="field6_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field6" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field6_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field6--><!-- Field7-->
                        <tr class="field7_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field7" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field7_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field7--><!-- Field8-->
                        <tr class="field8_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field8" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field8_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field8--><!-- Field9-->
                        <tr class="field9_row" style="display: none;">
                            <td align="right"><strong><input type="text" id="label_field9" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field9_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field9--><!-- Field10-->
                        <tr class="field10_row">
                            <td align="right"><strong><input type="text" id="label_field10" value="" class="invoice-input" style="text-align: right; font-weight: bold;"></strong></td>
                            <td align="left" style="padding-left:20px;"><input type="text" id="field9_value" value="" class="invoice-input" style="text-align: right;"></td>
                        </tr>
                        <!-- /Field9-->
                    </tbody>
                </table>
                </td>
            </tr>
        </tbody>
    </table>
    </div>

    <div id="items-list"><table class="table table-condensed table-bordered table-striped items-table">
        <thead>
            <tr>
                <th><input type="text" id="label_description" value="Description" class="invoice-input"></th>
                <th class="mount-header"><input type="text" id="label_qty" value="Quantity" class="invoice-input"></th>
                <th class="mount-header"><input type="text" id="label_unit_price" value="Unit price" class="invoice-input"></th>
                <th class="tax1-header" style="display: none;"><input type="text" id="label_tax_1" value="Tax" class="invoice-input"></th>
                <th class="tax2-header" style="display: none;"><input type="text" id="label_tax_2" value="Extra Tax" class="invoice-input"></th>
                <th class="subtotal-header"><input type="text" id="label_item_subtotal" value="Amount" class="invoice-input"></th>
                <th width="20">&nbsp;</th>
            </tr>
        </thead>
        <tfoot id="TotalsSection">
            <tr class="totals-row" id="SubtotalRow" style="display: none;">
                <td class="wide-cell" colspan="2"></td>
                <td><strong><input type="text" id="label_subtotal" value="Subtotal" class="invoice-input" style="font-weight: bold;"></strong>
                </td><td colspan="2"><span id="subtotal">$310.00</span>
            </td></tr>
            <tr class="totals-row" id="TotalRow">
                <td class="wide-cell" colspan="2"><button type="button" id="AddProduct" class="btn btn-small btn-primary"><i class="fa fa-plus"></i> Add Line</button></td>
                <td><strong><input type="text" id="label_total" value="Total" class="invoice-input" style="font-weight: bold;"></strong>
                </td><td colspan="2"><span id="total">$310.00</span>
            </td></tr>
            <tr class="totals-row shaped" id="PaidRow">
                <td class="wide-cell" colspan="2"><a href="#" class="show-row" id="toggle_paid"></a></td>
                <td><strong><input type="text" id="label_paid" value="Paid Amount" class="invoice-input" style="font-weight: bold;"></strong>
                </td><td colspan="2"><input type="text" id="paid" value="" class="invoice-input">
            </td></tr>
            <tr class="totals-row shaped" id="UnpaidRow">
                <td class="wide-cell" colspan="2"></td>
                <td><strong><input type="text" id="label_unpaid" value="Balance Due" class="invoice-input" style="font-weight: bold;"></strong>
                </td><td colspan="2"><span id="unpaid">$310.00</span>
            </td></tr>
        </tfoot>
        <tbody id="ItemsTable">
        <tr description="Item 1 description" qty="15" unit_price="10" discount="0" subtotal="150" total="150" class="item-row">
    <td><textarea data-key="description" class="editable input-block-level" type="text" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 40px;">Item 1 description</textarea></td>
    <td><input data-key="qty" class="editable input-mini" value="15"></td>
    <td><input data-key="unit_price" class="editable input-mini" value="10"></td>
    <td class="tax-container tax1-container" data-item-key="tax1" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs  selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">

            </ul>
        </div>
    </td>
    <td class="tax-container tax2-container" data-item-key="tax2" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">
            </ul>
        </div>
    </td>
    <td data-key="subtotal">150</td>
    <td><btn href="#" class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash icon-white"></i></btn></td>        </tr><tr description="Item 2 description" qty="10" unit_price="5" discount="0" subtotal="50" total="50" class="item-row">
    <td><textarea data-key="description" class="editable input-block-level" type="text" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 40px;">Item 2 description</textarea></td>
    <td><input data-key="qty" class="editable input-mini" value="10"></td>
    <td><input data-key="unit_price" class="editable input-mini" value="5"></td>
    <td class="tax-container tax1-container" data-item-key="tax1" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs  selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">

            </ul>
        </div>
    </td>
    <td class="tax-container tax2-container" data-item-key="tax2" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">
            </ul>
        </div>
    </td>
    <td data-key="subtotal">50</td>
    <td><btn href="#" class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash icon-white"></i></btn></td>        </tr><tr description="Item 3 description" qty="20" unit_price="5.5" discount="0" subtotal="110" total="110" class="item-row">
    <td><textarea data-key="description" class="editable input-block-level" type="text" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 40px;">Item 3 description</textarea></td>
    <td><input data-key="qty" class="editable input-mini" value="20"></td>
    <td><input data-key="unit_price" class="editable input-mini" value="5.5"></td>
    <td class="tax-container tax1-container" data-item-key="tax1" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs  selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">

            </ul>
        </div>
    </td>
    <td class="tax-container tax2-container" data-item-key="tax2" style="display: none;">
        <div class="btn-group">
            <button class="btn btn-sm btn-xxs selected-tax" autocomplete="off">Select</button>
            <button class="btn btn-sm btn-xxs dropdown-toggle" data-toggle="dropdown" autocomplete="off"><span class="caret"></span></button>
            <ul class="dropdown-menu tax-list">
            </ul>
        </div>
    </td>
    <td data-key="subtotal">110</td>
    <td><btn href="#" class="btn btn-danger btn-sm remove-item"><i class="fa fa-trash icon-white"></i></btn></td>        </tr></tbody>
    </table></div>

    <div class="notes-block">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td>
                <textarea id="notes" rows="2" class="invoice-input" style="display: none; overflow: hidden; overflow-wrap: break-word; resize: none; height: 80px;"></textarea><div class="reset_editor invoice-input mce-content-body" id="notes_editor" style="width: 670px; min-height: 80px; position: relative;" contenteditable="true" spellcheck="false"><p>Notes</p></div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    &nbsp;</div>
    </div></div>
                <br>
                <br>
                <br>
                <br>
            </div>