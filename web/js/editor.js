/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
const editor = grapesjs.init({
  // Indicate where to init the editor. You can also pass an HTMLElement
  container: '#gjs',
  fromElement: true,
  width: 'auto',
  storageManager: { type: null },
  panels: { defaults: [] },
  plugins: ['gjs-blocks-basic']
});




