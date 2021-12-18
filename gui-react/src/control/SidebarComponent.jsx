/* import { Button, ListItem } from "@material-ui/core"; */
import { Component } from "react";
import { Link } from 'react-router-dom';
import classes from '../css/control.module.css';



import * as React from 'react';
import { styled, useTheme } from '@mui/material/styles';
import Box from '@mui/material/Box';
import MuiDrawer from '@mui/material/Drawer';
import MuiAppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import List from '@mui/material/List';
import CssBaseline from '@mui/material/CssBaseline';
import Typography from '@mui/material/Typography';
import Divider from '@mui/material/Divider';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import ChevronRightIcon from '@mui/icons-material/ChevronRight';
import ListItem from '@mui/material/ListItem';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import KeyIcon from '@mui/icons-material/Key';
import PasswordIcon from '@mui/icons-material/Password';
import FormatListBulletedIcon from '@mui/icons-material/FormatListBulleted';
import HowToRegIcon from '@mui/icons-material/HowToReg';
import NavbarComponent from "./NavbarComponent";
import AddIcon from '@mui/icons-material/Add';
import LinkIcon from '@mui/icons-material/Link';


const drawerWidth = 200;

const openedMixin = (theme) => ({
    width: drawerWidth,
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
    }),
    overflowX: 'hidden',
});

const closedMixin = (theme) => ({
    transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    overflowX: 'hidden',
    width: `calc(${theme.spacing(7)} + 1px)`,
    [theme.breakpoints.up('sm')]: {
        width: `calc(${theme.spacing(9)} + 1px)`,
    },
});

const DrawerHeader = styled('div')(({ theme }) => ({
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'flex-end',
    padding: theme.spacing(0, 1),
    // necessary for content to be below app bar
    ...theme.mixins.toolbar,
}));

const AppBar = styled(MuiAppBar, {
    shouldForwardProp: (prop) => prop !== 'open',
})(({ theme, open }) => ({
    zIndex: theme.zIndex.drawer + 1,
    transition: theme.transitions.create(['width', 'margin'], {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.leavingScreen,
    }),
    ...(open && {
        marginLeft: drawerWidth,
        width: `calc(100% - ${drawerWidth}px)`,
        transition: theme.transitions.create(['width', 'margin'], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.enteringScreen,
        }),
    }),
}));

const Drawer = styled(MuiDrawer, { shouldForwardProp: (prop) => prop !== 'open' })(
    ({ theme, open }) => ({
        width: drawerWidth,
        flexShrink: 0,
        whiteSpace: 'nowrap',
        boxSizing: 'border-box',
        ...(open && {
            ...openedMixin(theme),
            '& .MuiDrawer-paper': openedMixin(theme),
        }),
        ...(!open && {
            ...closedMixin(theme),
            '& .MuiDrawer-paper': closedMixin(theme),
        }),
    }),
);

export default function MiniDrawer() {
    const theme = useTheme();
    const [open, setOpen] = React.useState(true);

    const handleDrawerOpen = () => {
        setOpen(true);
    };

    const handleDrawerClose = () => {
        setOpen(false);
    };


    const acciones = [
        {
            "text": "Permisos",
            "icon":<KeyIcon></KeyIcon>,
            "to": "/permisos"
        },
        {
            "text": "Usuarios",
            "icon": <HowToRegIcon></HowToRegIcon>,
            "to": "/students"
        },
        {
            "text": "Listar Roles",
            "icon": <FormatListBulletedIcon></FormatListBulletedIcon>,
            "to": "/lista_roles"
        },
        {
            "text": "Agregar Rol",
            "icon": <AddIcon></AddIcon>,
            "to": "/rol"
        },
        {
            "text": "Agregar Permiso",
            "icon": <AddIcon></AddIcon>,
            "to": "/agregar_permiso"
        },
        {
            "text": "Vincular Rol",
            "icon": <LinkIcon></LinkIcon>,
            "to": "/vincular_rol"
        },
        {
            "text": "Asignar Permiso",
            "icon": <LinkIcon></LinkIcon>,
            "to": "/asignar_permiso"
        },
    ]


    const acciones_secunadarias = [
        {
            "text": "Recuperar Contra.",
            "icon": <HowToRegIcon></HowToRegIcon>,
            "to": "/recuperar_contrasena"
        },
        {
            "text": "Cambiar Contra.",
            "icon": <PasswordIcon></PasswordIcon>,
            "to": "/cambiar_contrasena"
        }

    ]

    return (
        <div className={classes.sidebar}>


            <Box sx={{ display: 'flex' }}>
                <CssBaseline />
                <AppBar position="fixed" style={{ background: "#e04356" }} open={open}>
                    <Toolbar>
                        <IconButton
                            color="inherit"
                            aria-label="open drawer"
                            onClick={handleDrawerOpen}
                            edge="start"
                            sx={{
                                marginRight: '36px',
                                
                                ...(open && { display: 'none' }),
                            }}
                        >
                            <MenuIcon />
                        </IconButton>
                        <Typography noWrap component="div"  style={{ width:"100%"}}>
                            <NavbarComponent></NavbarComponent>
                        </Typography>
                    </Toolbar>
                </AppBar>
                <Drawer variant="permanent" open={open}>
                    <DrawerHeader>
                        <IconButton onClick={handleDrawerClose} width="200px">
                            {theme.direction === 'rtl' ? <ChevronRightIcon /> : <ChevronLeftIcon />}
                        </IconButton>
                    </DrawerHeader>
                    <Divider style={{marginTop:"15px" }}/>
                    <List>
                        {acciones.map((text) => (
                            <Link to={text.to} className={<ListItem button></ListItem>}>
                                <ListItem button key={text.text}>
                                    <ListItemIcon>
                                        {text.icon}
                                    </ListItemIcon>
                                    {/* <ListItemText primary={text} /> */}
                                    {text.text}
                                </ListItem>
                            </Link>
                        )
                        )
                        }
                    </List>
                    <Divider />
                    <List>
                        {acciones_secunadarias.map((text) => (
                            <Link to={text.to} className={<ListItem button></ListItem>}>
                                <ListItem button key={text.text}>
                                    <ListItemIcon>
                                        {text.icon}
                                    </ListItemIcon>
                                    <ListItemText primary={text.text} />
                                </ListItem>
                            </Link>
                        ))}
                    </List>
                </Drawer>
                {/* <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
                    <DrawerHeader />
                </Box> */}
            </Box>



        </div>
    );
}
