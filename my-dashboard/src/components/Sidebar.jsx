import { Drawer, List, ListItem, ListItemText } from '@mui/material';
import { Link } from 'react-router-dom';

export default function Sidebar() {
  return (
    <Drawer variant="permanent">
      <List>
        <ListItem button component={Link} to="/admin">
          <ListItemText primary="Admin" />
        </ListItem>
        <ListItem button component={Link} to="/commercial">
          <ListItemText primary="Commercial" />
        </ListItem>
        <ListItem button component={Link} to="/controleur">
          <ListItemText primary="Contrôleur" />
        </ListItem>
      </List>
    </Drawer>
  );
}
