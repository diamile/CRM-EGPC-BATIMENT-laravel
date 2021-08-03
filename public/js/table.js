const table = document.querySelector('table');

const sortTable = (element, ascending = true) => {
  const documentFragment = new DocumentFragment();
  const [arrowUp, arrowDown, arrowUpDown] = ['\u2191', '\u2193', '\u21C5'];
  const { tHead, tBodies } = element;
  const [tBody] = tBodies;
  const theadCells = tHead.querySelectorAll('th:not([data-sortable="false"])');
  const tbodyRows = [...tBody.rows];
  
  const getCellValue = cell => {
    return cell.innerText || cell.textContent;
  }

  const compareValue = (valueOne, valueTwo) => {
    return (
      valueOne !== '' &&
      valueTwo !== '' &&
      !isNaN(valueOne) &&
      !isNaN(valueTwo)
    )
      ? valueOne - valueTwo
      : valueOne.toString().localeCompare(valueTwo.toString());
  }
  
  const sort = (index, sortDirection) => {
    const sortedRows = tbodyRows.sort((a, b) => {
      const aCellValue = getCellValue(a.cells[index]);
      const bCellValue = getCellValue(b.cells[index]);

      return sortDirection
        ? compareValue(aCellValue, bCellValue)
        : compareValue(bCellValue, aCellValue);
    });

    while(tBody.firstElementChild) {
      tBody.removeChild(tBody.lastElementChild);
    }

    documentFragment.append(...sortedRows);
    tBody.appendChild(documentFragment);
  }
  
  if (!element.classList.contains('table-sortable')) {
    element.classList.add('table-sortable');
  }

  theadCells.forEach((theadCell, index) => {
    let isAscending = !ascending;
    
    theadCell.dataset.sortDirection = arrowUpDown;
    
    theadCell.addEventListener('click', e => {
      theadCells.forEach(cell => {
        if (cell.dataset.sortDirection !== arrowUpDown) {
          cell.dataset.sortDirection = arrowUpDown;
        }
      });
      
      e.target.dataset.sortDirection = isAscending
        ? arrowUp
        : arrowDown;
      
      sort(index, isAscending);
      isAscending = !isAscending;
    });
  });
  
  // Sort the first column/cell by default
  theadCells[0].dataset.sortDirection = ascending
    ? arrowUp
    : arrowDown;
  sort(0, ascending);
}

sortTable(table, false);


document.getElementById('is_valid').addEventListener('click',()=>{
    alert('Etes-vous sure de vouloir valider ce devis');
})


document.getElementById('is_not_valid').addEventListener('click',()=>{
    alert('Etes-vous sure de vouloir valider ce devis');
    window.onload=true;
})
