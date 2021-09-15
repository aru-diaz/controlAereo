Control de tráfico aéreo. 
 
Objetivo: 
Usar Laravel para desarrollar un control de tráfico aéreo que cumpla con los siguientes 
requerimientos. 
Descripción: 
Desarrollar un sistema que maneje el tráfico aéreo de una aerolínea, que permite liberar 
aeronaves dependiendo de las características de esta, debe de agregar una aeronave a la lista 
de espera y poder editar una ya existente. 
Aeronave:  
La aeronave debe de contar con las siguientes características.  
• Id 
• Tipo: Emergencia, VIP, Pasajero o Cargo. 
• Tamaño: Chico, Grande. 
Lógica de lista de espera: 
El control de tráfico aéreo debe se seguir la siguiente lógica para liberar aeronaves. 
1. VIP es más importante que otro tipo, excepto Emergencia. 
2. Emergencia siempre tiene la mayor prioridad. 
3. Pasajero tiene mayor prioridad que Cargo. 
4. El tamaño Grande tiene mayor prioridad sobre los chicos del mismo tipo. 
5. Las aeronaves con tamaño y tipo que fueron agregadas anteriormente que otras 
aeronaves con el mismo tamaño y tipo agregadas después. 
Requerimientos:  
• Agregar los servicios REST con sus end-points correspondientes, con sus mensajes de 
error correspondiente. 
• Crear las interfaces para que el usuario pueda interactuar con los diferentes end-
points. 
• Agregar un README explicando la configuración del proyecto. 
• Agregar Tests que validen la funcionalidad. 
• Subir proyecto a Github. 
Puntos Extra: 
- Login. 
