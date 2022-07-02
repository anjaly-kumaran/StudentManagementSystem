bf3044 - main
c37384 - hover
bd9596 - disabled

.page-link {
  position: relative;
  display: block;
  padding: .5rem .75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #bf3044;//change
  background-color: #fff;
  border: 1px solid #dee2e6
}

.page-link:hover {
  z-index: 2;
  color: #bf3044;//change
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6
}

.page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: #bf3044;//change
  border-color: #bf3044//change
}

.dropdown-item:hover, .dropdown-item:focus {
  color: #16181b;
  text-decoration: none;
  background-color: #c37384;
}

.dropdown-item.active, .dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #bf3044;
}

.dropdown-item.disabled, .dropdown-item:disabled {
  color: #bd9596;
  pointer-events: none;
  background-color: transparent;
}

.select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
  background-color: #bd9596 !important;
  color: #fff;
}

.select2-container--default .select2-crm.select2-container--focus .select2-selection--multiple,
.select2-crm .select2-container--default.select2-container--focus .select2-selection--multiple {
  border-color: #bf3044;
}