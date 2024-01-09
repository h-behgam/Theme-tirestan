<?php
/**
 * The template for displaying search section.
 */
?>

<div class="ts-container ts-container-fluid ts-search">
    <div class="ts-row">

        <!-- Header -->
        <div class="ts-column ts-col-12 ts-search-header">
            <div class="ts-row">
                <h3 class="ts-column ts-col-12">جستجوی پیشرفته لاستیک</h3>
                <span class="ts-column ts-col-6 ts-search-header-tab ts-search-header-tab-active" data-category="passenger-tire">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjYiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA2NiA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggb3BhY2l0eT0iMC4xIiBkPSJNMTIuNTg0IDEyLjM5NzhWMS4xODg0OEMxMS43NDMyIDEuMzk1OTEgMTAuOTU3IDEuNzg0MzMgMTAuMjc5NiAyLjMyNjk5QzkuNjAyMjkgMi44Njk2NiA5LjA0OTggMy41NTM2NiA4LjY2MDI0IDQuMzMxOTJMNS4wOTU5NSAxMS41MTU5VjI4LjFDNS42MTc1OSAyOS4wMzc0IDYuMzc4NTMgMjkuODE3NCA3LjMwMDA3IDMwLjM1OTVDOC4yMjE2IDMwLjkwMTUgOS4yNzAyNSAzMS4xODU5IDEwLjMzNzYgMzEuMTgzMUg1OC4yNjA4QzU5Ljg0OTYgMzEuMTgzMSA2MS4zNzMyIDMwLjU0NzcgNjIuNDk2NyAyOS40MTY4QzYzLjYyMDEgMjguMjg1OCA2NC4yNTEyIDI2Ljc1MTkgNjQuMjUxMiAyNS4xNTI1VjIzLjcwNTJIMjMuODE2QzIwLjgzNzEgMjMuNzA1MiAxNy45ODAxIDIyLjUxMzkgMTUuODczNyAyMC4zOTMzQzEzLjc2NzMgMTguMjcyOCAxMi41ODQgMTUuMzk2NyAxMi41ODQgMTIuMzk3OFoiIGZpbGw9ImJsYWNrIi8+CjxwYXRoIGQ9Ik01LjQ5MjkyIDE5LjUzNjVIMTUuOTc2MU0xOS43MjAxIDE5LjUzNjVIMjAuNDY4OSIgc3Ryb2tlPSIjRkY5NDk0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNNDguNjA4NyAxMS42NDRIMzcuNjkxMkMzNy40OTI2IDExLjY0NCAzNy4zMDIxIDExLjU2NDYgMzcuMTYxNyAxMS40MjMyQzM3LjAyMTMgMTEuMjgxOCAzNi45NDI0IDExLjA5MDEgMzYuOTQyNCAxMC44OTAyVjUuNjEzMzlDMzYuOTQyNCA1LjQxMzQ3IDM3LjAyMTMgNS4yMjE3MyAzNy4xNjE3IDUuMDgwMzZDMzcuMzAyMSA0LjkzODk5IDM3LjQ5MjYgNC44NTk1NyAzNy42OTEyIDQuODU5NTdINDMuMzY3MUM0My40NjU2IDQuODU5IDQzLjU2MzMgNC44NzgwMSA0My42NTQ2IDQuOTE1NTNDNDMuNzQ1OCA0Ljk1MzA0IDQzLjgyODggNS4wMDgzMSA0My44OTg3IDUuMDc4MThMNDkuMTQwMyAxMC4zNTQ5QzQ5LjI0NTkgMTAuNDYwNCA0OS4zMTggMTAuNTk1MSA0OS4zNDcyIDEwLjc0MTlDNDkuMzc2NSAxMC44ODg3IDQ5LjM2MTYgMTEuMDQwOSA0OS4zMDQ2IDExLjE3OTJDNDkuMjQ3NiAxMS4zMTc1IDQ5LjE1MDkgMTEuNDM1NiA0OS4wMjcgMTEuNTE4M0M0OC45MDMgMTEuNjAxMSA0OC43NTc0IDExLjY0NDggNDguNjA4NyAxMS42NDRaTTE2LjQ5MjYgMTEuNjQ0SDMwLjk0NDVDMzEuMTQzMSAxMS42NDQgMzEuMzMzNSAxMS41NjQ2IDMxLjQ3NCAxMS40MjMyQzMxLjYxNDQgMTEuMjgxOCAzMS42OTMzIDExLjA5MDEgMzEuNjkzMyAxMC44OTAyVjUuNjEzMzlDMzEuNjkzMyA1LjQxMzQ3IDMxLjYxNDQgNS4yMjE3MyAzMS40NzQgNS4wODAzNkMzMS4zMzM1IDQuOTM4OTkgMzEuMTQzMSA0Ljg1OTU3IDMwLjk0NDUgNC44NTk1N0gxOS40MDU1QzE5LjI3MjggNC44NTk4IDE5LjE0MjUgNC44OTU1MiAxOS4wMjgxIDQuOTYzMDdDMTguOTEzNiA1LjAzMDYyIDE4LjgxOSA1LjEyNzU4IDE4Ljc1NCA1LjI0NDAyTDE1Ljg0MTIgMTAuNTIwOEMxNS43NzcyIDEwLjYzNTQgMTUuNzQ0MSAxMC43NjQ5IDE1Ljc0NTEgMTAuODk2M0MxNS43NDYyIDExLjAyNzggMTUuNzgxNCAxMS4xNTY3IDE1Ljg0NzMgMTEuMjcwM0MxNS45MTMxIDExLjM4MzggMTYuMDA3MyAxMS40NzggMTYuMTIwNSAxMS41NDM2QzE2LjIzMzggMTEuNjA5MSAxNi4zNjIgMTEuNjQzOCAxNi40OTI2IDExLjY0NFoiIGZpbGw9IiNGRjk0OTQiLz4KPHBhdGggZD0iTTUxLjIyOTYgMTEuMjk3Mkw0Mi43OTA2IDIuNzYzOTVDNDIuMjMzOSAyLjIwNDEgNDEuNTczIDEuNzYwMTcgNDAuODQ1OCAxLjQ1NzVDNDAuMTE4NiAxLjE1NDg0IDM5LjMzOTMgMC45OTkzNzkgMzguNTUyNCAxSDE0Ljc4NTRDMTMuNjcyNSAwLjk5OTIgMTIuNTgxNCAxLjMxMDUxIDExLjYzNDQgMS44OTkwMkMxMC42ODc1IDIuNDg3NTMgOS45MjIwNCAzLjMyOTk4IDkuNDI0MDIgNC4zMzE5TDUuNzI0OTUgMTEuNzg3MkM1LjMwOTk3IDEyLjYyNTQgNS4wOTQ2MiAxMy41NDk0IDUuMDk1OTUgMTQuNDg1OVYyNS4xMjIzQzUuMDk1OTUgMjYuNzIxOCA1LjcyNzA4IDI4LjI1NTcgNi44NTA1IDI5LjM4NjZDNy45NzM5MiAzMC41MTc2IDkuNDk3NjEgMzEuMTUyOSAxMS4wODY0IDMxLjE1MjlINTkuMDA5NkM2MC41OTg0IDMxLjE1MjkgNjIuMTIyMSAzMC41MTc2IDYzLjI0NTUgMjkuMzg2NkM2NC4zNjg5IDI4LjI1NTcgNjUgMjYuNzIxOCA2NSAyNS4xMjIzVjE5LjA5MThDNjUgMTcuNDkyMyA2NC4zNjg5IDE1Ljk1ODQgNjMuMjQ1NSAxNC44Mjc1QzYyLjEyMjEgMTMuNjk2NSA2MC41OTg0IDEzLjA2MTIgNTkuMDA5NiAxMy4wNjEySDU1LjQ5NzdDNTQuNzA1OCAxMy4wNjU4IDUzLjkyMDggMTIuOTEyMiA1My4xODgyIDEyLjYwOTVDNTIuNDU1NiAxMi4zMDY3IDUxLjc4OTkgMTEuODYwNyA1MS4yMjk2IDExLjI5NzJaIiBzdHJva2U9ImJsYWNrIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNMTkuMzQ1NyAzOC4wMjc4QzIzLjA2NzYgMzguMDI3OCAyNi4wODQ5IDM0Ljk5MDMgMjYuMDg0OSAzMS4yNDM0QzI2LjA4NDkgMjcuNDk2NSAyMy4wNjc2IDI0LjQ1OSAxOS4zNDU3IDI0LjQ1OUMxNS42MjM3IDI0LjQ1OSAxMi42MDY0IDI3LjQ5NjUgMTIuNjA2NCAzMS4yNDM0QzEyLjYwNjQgMzQuOTkwMyAxNS42MjM3IDM4LjAyNzggMTkuMzQ1NyAzOC4wMjc4WiIgZmlsbD0id2hpdGUiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik00OS4yOTc2IDM4LjAyNzhDNTMuMDE5NSAzOC4wMjc4IDU2LjAzNjggMzQuOTkwMyA1Ni4wMzY4IDMxLjI0MzRDNTYuMDM2OCAyNy40OTY1IDUzLjAxOTUgMjQuNDU5IDQ5LjI5NzYgMjQuNDU5QzQ1LjU3NTYgMjQuNDU5IDQyLjU1ODMgMjcuNDk2NSA0Mi41NTgzIDMxLjI0MzRDNDIuNTU4MyAzNC45OTAzIDQ1LjU3NTYgMzguMDI3OCA0OS4yOTc2IDM4LjAyNzhaIiBmaWxsPSJ3aGl0ZSIgc3Ryb2tlPSJibGFjayIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTMzLjE5ODQgMTkuNTM2NUgzNi4xOTM2TTY0Ljg1MDMgMjEuOTU2M0g2My4xNThDNjIuODM5NCAyMS45NTgyIDYyLjUyMzUgMjEuODk3IDYyLjIyODQgMjEuNzc2MUM2MS45MzMzIDIxLjY1NTIgNjEuNjY0NyAyMS40NzcgNjEuNDM4IDIxLjI1MTZDNjEuMjExNCAyMS4wMjYyIDYxLjAzMSAyMC43NTggNjAuOTA3MyAyMC40NjI1QzYwLjc4MzUgMjAuMTY2OSA2MC43MTg4IDE5Ljg0OTcgNjAuNzE2OSAxOS41Mjg5QzYwLjcxODggMTkuMjA4MiA2MC43ODM1IDE4Ljg5MSA2MC45MDczIDE4LjU5NTRDNjEuMDMxIDE4LjI5OTkgNjEuMjExNCAxOC4wMzE3IDYxLjQzOCAxNy44MDYzQzYxLjY2NDcgMTcuNTgwOSA2MS45MzMzIDE3LjQwMjcgNjIuMjI4NCAxNy4yODE4QzYyLjUyMzUgMTcuMTYwOSA2Mi44Mzk0IDE3LjA5OTcgNjMuMTU4IDE3LjEwMTZINjQuMzc4NU0zMi42MzY4IDM4LjAyNzhINTkuMTU5NE01LjQxMDQ0IDM4LjAyNzhIMjcuNDEwMk0xLjc0ODggMzguMDI3OEgyLjM1NTMzTTEgMjIuNTc0NEg0Ljc0NE0zLjI0NjQgMjQuNDU5SDQuNzQ0TTQ0Ljg2NDggMTMuMTUxNkgzMy45NDcyQzMzLjc0ODYgMTMuMTUxNiAzMy41NTgyIDEzLjA3MjIgMzMuNDE3OCAxMi45MzA4QzMzLjI3NzMgMTIuNzg5NCAzMy4xOTg0IDEyLjU5NzcgMzMuMTk4NCAxMi4zOTc4VjcuMTIxMDJDMzMuMTk4NCA2LjkyMTEgMzMuMjc3MyA2LjcyOTM2IDMzLjQxNzggNi41ODc5OUMzMy41NTgyIDYuNDQ2NjIgMzMuNzQ4NiA2LjM2NzIgMzMuOTQ3MiA2LjM2NzJIMzkuNjIzMUMzOS43MjE3IDYuMzY2NjMgMzkuODE5NCA2LjM4NTY0IDM5LjkxMDYgNi40MjMxNkM0MC4wMDE4IDYuNDYwNjcgNDAuMDg0OCA2LjUxNTk0IDQwLjE1NDggNi41ODU4MUw0NS4zOTY0IDExLjg2MjZDNDUuNTAyIDExLjk2OCA0NS41NzQgMTIuMTAyNyA0NS42MDMzIDEyLjI0OTVDNDUuNjMyNSAxMi4zOTYzIDQ1LjYxNzcgMTIuNTQ4NiA0NS41NjA3IDEyLjY4NjlDNDUuNTAzNiAxMi44MjUxIDQ1LjQwNyAxMi45NDMyIDQ1LjI4MyAxMy4wMjZDNDUuMTU5MSAxMy4xMDg3IDQ1LjAxMzUgMTMuMTUyNSA0NC44NjQ4IDEzLjE1MTZaTTEyLjc0ODcgMTMuMTUxNkgyNy4yMDA1QzI3LjM5OTEgMTMuMTUxNiAyNy41ODk2IDEzLjA3MjIgMjcuNzMgMTIuOTMwOEMyNy44NzA0IDEyLjc4OTQgMjcuOTQ5MyAxMi41OTc3IDI3Ljk0OTMgMTIuMzk3OFY3LjEyMTAyQzI3Ljk0OTMgNi45MjExIDI3Ljg3MDQgNi43MjkzNiAyNy43MyA2LjU4Nzk5QzI3LjU4OTYgNi40NDY2MiAyNy4zOTkxIDYuMzY3MiAyNy4yMDA1IDYuMzY3MkgxNS42NjE1QzE1LjUyODggNi4zNjc0MyAxNS4zOTg2IDYuNDAzMTUgMTUuMjg0MSA2LjQ3MDdDMTUuMTY5NyA2LjUzODI1IDE1LjA3NTEgNi42MzUyMSAxNS4wMTAxIDYuNzUxNjVMMTIuMDk3MiAxMi4wMjg0QzEyLjAzMzIgMTIuMTQzIDEyLjAwMDEgMTIuMjcyNSAxMi4wMDEyIDEyLjQwNEMxMi4wMDIzIDEyLjUzNTQgMTIuMDM3NSAxMi42NjQzIDEyLjEwMzMgMTIuNzc3OUMxMi4xNjkyIDEyLjg5MTQgMTIuMjYzNCAxMi45ODU3IDEyLjM3NjYgMTMuMDUxMkMxMi40ODk4IDEzLjExNjggMTIuNjE4MSAxMy4xNTE0IDEyLjc0ODcgMTMuMTUxNloiIHN0cm9rZT0iYmxhY2siIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjwvc3ZnPgo=" alt="car" />
                </span>
                <span class="ts-column ts-col-6 ts-search-header-tab" data-category="tbr">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjYiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA2NiA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgb3BhY2l0eT0iMC4xIj4KPHBhdGggZD0iTTEwLjg3NjYgMS4xMTEyN0M5LjIyNDA5IDEuNDUzMjIgNy43Mzg5MSAyLjM2MzQ2IDYuNjcyMzcgMy42ODc5M0M1LjYwNTg0IDUuMDEyNDEgNS4wMjM0NiA2LjY2OTc3IDUuMDIzOCA4LjM3OTUyVjMwLjY2NjRDNS4wMjM4IDMxLjA1OTggNS4xNzc5NiAzMS40MzcgNS40NTIzNiAzMS43MTUyQzUuNzI2NzYgMzEuOTkzNCA2LjA5ODkzIDMyLjE0OTcgNi40ODcgMzIuMTQ5N0gzNC4yODc2VjI2LjI3NTdIMjUuNTA4NUMyMS42Mjc5IDI2LjI3NTcgMTcuOTA2MiAyNC43MTMgMTUuMTYyMiAyMS45MzEyQzEyLjQxODEgMTkuMTQ5NCAxMC44NzY2IDE1LjM3NjYgMTAuODc2NiAxMS40NDI2VjEuMTExMjdaIiBmaWxsPSIjODQ4NDg0Ii8+CjxwYXRoIGQ9Ik0zNy45MzA5IDI2LjI3NTdWMzIuMTQ5Nkg2Mi4wNzM2QzYyLjg0OTcgMzIuMTQ5NiA2My41OTQgMzEuODM3MSA2NC4xNDI4IDMxLjI4MDdDNjQuNjkxNiAzMC43MjQ0IDY0Ljk5OTkgMjkuOTY5OCA2NC45OTk5IDI5LjE4M1YyNi4yNzU3SDM3LjkzMDlaIiBmaWxsPSIjODQ4NDg0Ii8+CjwvZz4KPHBhdGggZD0iTTUwLjQyNjYgMTUuODkyNUg0NC41Mjk5QzQ0LjMzNTkgMTUuODkyNSA0NC4xNDk4IDE1LjgxNDMgNDQuMDEyNiAxNS42NzUzQzQzLjg3NTQgMTUuNTM2MiA0My43OTgzIDE1LjM0NzUgNDMuNzk4MyAxNS4xNTA4VjExLjQ0MjVDNDMuNzk4MyAxMS4yNDU4IDQzLjg3NTQgMTEuMDU3MiA0NC4wMTI2IDEwLjkxODFDNDQuMTQ5OCAxMC43NzkgNDQuMzM1OSAxMC43MDA5IDQ0LjUyOTkgMTAuNzAwOUg0Ny44MTQ4QzQ3LjkzMDkgMTAuNzAxNCA0OC4wNDUxIDEwLjcyOTkgNDguMTQ4MiAxMC43ODQxQzQ4LjI1MTIgMTAuODM4MyA0OC4zNDAxIDEwLjkxNjUgNDguNDA3NCAxMS4wMTI0TDUxLjAxOTIgMTQuNzIwN0M1MS4wOTY5IDE0LjgzMTMgNTEuMTQzMiAxNC45NjE2IDUxLjE1MjkgMTUuMDk3MUM1MS4xNjI2IDE1LjIzMjYgNTEuMTM1NCAxNS4zNjgzIDUxLjA3NDMgMTUuNDg5MkM1MS4wMTMxIDE1LjYxMDEgNTAuOTIwNCAxNS43MTE3IDUwLjgwNjEgMTUuNzgyOEM1MC42OTE5IDE1Ljg1MzkgNTAuNTYwNiAxNS44OTE5IDUwLjQyNjYgMTUuODkyNVoiIGZpbGw9IiNGRkM1OTkiLz4KPHBhdGggZD0iTTUuMzg5NTMgMjAuNjgzNkgxNS42MzE5IiBzdHJva2U9IiNGRkM1OTkiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik0xOS4yODk5IDIwLjY4MzZIMjAuMDIxNSIgc3Ryb2tlPSIjRkZDNTk5IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNNTQuMzkxOCAxNS44MzMyTDQ5LjM0MzggOS4wMDk4OUM0OS4yMDc1IDguODI1NjcgNDkuMDMwOCA4LjY3NjE1IDQ4LjgyNzYgOC41NzMxNkM0OC42MjQ0IDguNDcwMTggNDguNDAwNCA4LjQxNjU2IDQ4LjE3MzIgOC40MTY1NkgzOS4zOTQxQzM5LjAwNiA4LjQxNjU2IDM4LjYzMzkgOC41NzI4NCAzOC4zNTk1IDguODUxMDJDMzguMDg1MSA5LjEyOTE5IDM3LjkzMDkgOS41MDY0OCAzNy45MzA5IDkuODk5ODhWMzIuMTQ5Nkg2Mi4wNzM2QzYyLjg0OTcgMzIuMTQ5NiA2My41OTQgMzEuODM3MSA2NC4xNDI4IDMxLjI4MDdDNjQuNjkxNiAzMC43MjQ0IDY0Ljk5OTkgMjkuOTY5OCA2NC45OTk5IDI5LjE4M1YyMC4yODMxQzY0Ljk5OTkgMTkuNDk2MyA2NC42OTE2IDE4Ljc0MTcgNjQuMTQyOCAxOC4xODU0QzYzLjU5NCAxNy42MjkgNjIuODQ5NyAxNy4zMTY1IDYyLjA3MzYgMTcuMzE2NUg1Ny4zMTgyQzU2Ljc1MDMgMTcuMzE2NSA1Ni4xOTAyIDE3LjE4MjQgNTUuNjgyMyAxNi45MjVDNTUuMTc0NCAxNi42Njc1IDU0LjczMjUgMTYuMjkzNyA1NC4zOTE4IDE1LjgzMzJaIiBzdHJva2U9IiM4NDg0ODQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik01MS40NjU1IDM4Ljg4MzlDNTUuMTAxOSAzOC44ODM5IDU4LjA0OTggMzUuODk1NCA1OC4wNDk4IDMyLjIwOUM1OC4wNDk4IDI4LjUyMjUgNTUuMTAxOSAyNS41MzQxIDUxLjQ2NTUgMjUuNTM0MUM0Ny44MjkgMjUuNTM0MSA0NC44ODExIDI4LjUyMjUgNDQuODgxMSAzMi4yMDlDNDQuODgxMSAzNS44OTU0IDQ3LjgyOSAzOC44ODM5IDUxLjQ2NTUgMzguODgzOVoiIGZpbGw9IndoaXRlIiBzdHJva2U9IiM4NDg0ODQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik00MS45Njk0IDIwLjY4MzZINDQuODk1NyIgc3Ryb2tlPSIjODQ4NDg0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNMzUuNTY3OSAzOC44ODM5SDYxLjQ4ODMiIHN0cm9rZT0iIzg0ODQ4NCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTguOTc0MzcgMzguODgzOUgzMC40Njg3IiBzdHJva2U9IiM4NDg0ODQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik01LjM4OTUzIDM4Ljg4MzlINS45ODk0MyIgc3Ryb2tlPSIjODQ4NDg0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNNDguNTk3NiAxNy4zNzU5SDQyLjcwMUM0Mi41MDY5IDE3LjM3NTkgNDIuMzIwOCAxNy4yOTc3IDQyLjE4MzYgMTcuMTU4NkM0Mi4wNDY0IDE3LjAxOTYgNDEuOTY5NCAxNi44MzA5IDQxLjk2OTQgMTYuNjM0MlYxMi45MjU5QzQxLjk2OTQgMTIuNzI5MiA0Mi4wNDY0IDEyLjU0MDYgNDIuMTgzNiAxMi40MDE1QzQyLjMyMDggMTIuMjYyNCA0Mi41MDY5IDEyLjE4NDMgNDIuNzAxIDEyLjE4NDNINDUuOTg1OEM0Ni4xMDE5IDEyLjE4NDggNDYuMjE2MiAxMi4yMTMzIDQ2LjMxOTIgMTIuMjY3NUM0Ni40MjIyIDEyLjMyMTcgNDYuNTExMSAxMi4zOTk5IDQ2LjU3ODQgMTIuNDk1OEw0OS4xOTAyIDE2LjIwNDFDNDkuMjY4IDE2LjMxNDcgNDkuMzE0MiAxNi40NDUgNDkuMzIzOSAxNi41ODA1QzQ5LjMzMzYgMTYuNzE2IDQ5LjMwNjQgMTYuODUxNyA0OS4yNDUzIDE2Ljk3MjZDNDkuMTg0MSAxNy4wOTM1IDQ5LjA5MTQgMTcuMTk1MSA0OC45NzcyIDE3LjI2NjJDNDguODYzIDE3LjMzNzMgNDguNzMxNyAxNy4zNzUyIDQ4LjU5NzYgMTcuMzc1OVoiIHN0cm9rZT0iIzg0ODQ4NCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHBhdGggZD0iTTEgMjMuNjc5OUg0LjY1Nzk4IiBzdHJva2U9IiM4NDg0ODQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+CjxwYXRoIGQ9Ik0zLjE5NDgyIDI1LjUzNDFINC42NTgwMiIgc3Ryb2tlPSIjODQ4NDg0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNNS4wMDkxNiA4LjQxNjU5VjMwLjY2NjNDNS4wMDkxNiAzMS4wNTk3IDUuMTYzMzEgMzEuNDM3IDUuNDM3NzEgMzEuNzE1MkM1LjcxMjEyIDMxLjk5MzQgNi4wODQyOCAzMi4xNDk3IDYuNDcyMzUgMzIuMTQ5N0gzNC4yNzNWMi40ODMzMkMzNC4yNzMgMi4wODk5MiAzNC4xMTg4IDEuNzEyNjMgMzMuODQ0NCAxLjQzNDQ1QzMzLjU3IDEuMTU2MjggMzMuMTk3OSAxIDMyLjgwOTggMUgxMi4zMjUxQzEwLjM4NDggMSA4LjUyMzk2IDEuNzgxMzkgNy4xNTE5NSAzLjE3MjI3QzUuNzc5OTQgNC41NjMxNSA1LjAwOTE2IDYuNDQ5NTkgNS4wMDkxNiA4LjQxNjU5WiIgc3Ryb2tlPSIjODQ4NDg0IiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNMTkuNjQxIDM4Ljg4MzlDMjMuMjc3NCAzOC44ODM5IDI2LjIyNTQgMzUuODk1NCAyNi4yMjU0IDMyLjIwOUMyNi4yMjU0IDI4LjUyMjUgMjMuMjc3NCAyNS41MzQxIDE5LjY0MSAyNS41MzQxQzE2LjAwNDYgMjUuNTM0MSAxMy4wNTY2IDI4LjUyMjUgMTMuMDU2NiAzMi4yMDlDMTMuMDU2NiAzNS44OTU0IDE2LjAwNDYgMzguODgzOSAxOS42NDEgMzguODgzOVoiIGZpbGw9IndoaXRlIiBzdHJva2U9IiM4NDg0ODQiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjwvc3ZnPgo=" alt="truck" />
                </span>
            </div>
        </div>

        <!-- Body -->
        <div class="ts-column ts-col-12 ts-search-body">

            <!-- Tab -->
            <div class="ts-row ts-search-tab">
                <i></i>
                <div class="ts-column ts-col-4 ts-search-tab-active" id="ts-search-tab-specs" data-tab="specs">
                    <img src="data:image/webp;base64,UklGRgYDAABXRUJQVlA4TPoCAAAvNgALEPeFqG0bGff975C3PQpk0jbR3X/TTSZtE939N90G0rZNrd13tW3bMNCWquSMu+VU3g8IUAAgSCCsBamCZrxdcCDBDU+ALwUMoqlbfRAFCwhAWUEMLhkMBR/guhy2aJ89fjG8IVu2bdN25tG1bdu2bdu2HV/btm0ludrz4+5Z+2Tt85THiP4zcNtIUapjmCx9gvc/E5BWuKPsHBwZ5KgsZWyql99RHGa7xlp6uIzjn8niEHdr99D84b845iLBSMQF+ZaPi0INCRpq2RcfLfJiA2FIlwoHdNY/ahRBchQblnQ/q+QcvThyuNA7fvSDf4cPNh2/EdOAHtXNB1ugidYDIvbzOfD1xZ1qA8UJxCNVoCcM89iGItfk3ARnPuFguvU++uIE9Ih2N4XkmUzGKTFdxN0IQQ/XXgJf4EA4BpFSmgs4EqYtq2MHAMIyZlkfQNgQRs/gkYDY5Defo9iV1IewUw4ABCeD1Cj+rSEVG9592Jvd0Z9E0qDqrwIt3kh2nM5rC3uL/3PiwFLwQh9a0lCTEEtHY9JQrg1HJUxvDUynpfaJFPtySBbQXWQqhABGBaTGUwMtrWek1/QU8SePq0di0IZnSZ3TNlqar0mvX9Gf7/Ez33YsCI35cVLnppmWklcR4aUEAIrf8Ae5AIVPjUQBwUspLdFoBqyYb79l8UmFYAwkCphgAi2WGMfaQh+vPVkKchv75NyLRSta4Own2R0VzKIeaxP2Mqx1//2MT03dmvg7jVFsl2NXmmSySAONl0agRkfc+fYnf8Sd5zZQnlU2+XEfzRIvZyzoAUiUS/hzbA8A/IKNN3xfLdJkbYa/e4ADAcwujqizDEWqICHCqUcDDhjcIg4IgSqtGA30yMwh4qMWzRm/HiuBA9WIJ3kagqR/n6j2YxOfAwHMVMTnU//XuwTJbwlizl9SAejRrLIhjexX8CDPmtUsy+w9XLYDDkjuwvAZxJuJvva+sUvEmTABSAFWjFK6Z3ZujpZ7UowBQApIIbz/mQA=" alt="size" />
                    <span>سایز</span>
                </div>
                <div class="ts-column ts-col-4" id="ts-search-tab-brand" data-tab="brand">
                    <img src="data:image/webp;base64,UklGRjYDAABXRUJQVlA4TCkDAAAvNgALEJeGtm3b8O7u7eV2gn5AJm0T3f033WTSNtHdf9NtIG1b/GY3m7YNWdNWfeNud+reH1oCNbdsAgSzBGbdBC4HhiCV+FWGAENYG7HJCyscn68OaOgewOT7CWTbtm1I0i7btm3btm3btqvatm3bKrvifFJUIiJbrxH9Z+C2kSJ355jxD1L/1kBS+deQdwxPjvbVkTDdivOrJJDXwyHSEmM8ts7c60sPdHaLKD+ySE8TpCVCOndxtcdKxGEoZT2h88YSoHSITpqJuVIyBSvfvHlTubRXLnqKXqEKYPNsLYgn6RO7qWKmZtLHFEDn4aIjP5VUAnHxuU1DcjB591yND5vNIxCOfU51eaAqO6eD5qTht9fNx6FVQ6Gh2PtERLTUow3UUD0wsm3Ondleu+CQ/AQ9zrdU1A6e2n7vCsxvOcJoo5+75l2hHc7QFy3BI4inn1bQ/n4cmPupyNndy4LHGEPHtq+og43pq1/fr8ugbc8KURTKlSbTIFAyL+7LJm1d1QBMXi66Z1McTJgaqOy2cuVNUQI8KQtI2nq//fLNojvkPhwEHp8GnhzlKpnsBRSRPrve1eXem5QGdifvgAMPgTN3uMojM6irAW0bAFSYRmjS/tVq2waGPrP7ecRVOtni3A2gZU8GkFk8JRdO+QC61gAzH+DYA65CyAcTn4BMcgJkr9I6Q70Azt4SvK+XL3LlQNkoJGsY7nVBdpb6e8uHqAsGW+2Cvk5yJbs2AQumFji8Yj1D7A4g3U/d4ztmAmVDBVzh9BtpnPmsCvOlX1QHCDZqEuyXkgVnGRQET2KvRfTGr1DsR3ecDsoKenQbnCl/PgdM74UBXo/pUX9V07GNnXahiqQc7lBOUVB9uBIEKOSc+0n0bMBWcAgKT57J86Dw+IMeDB/tNCuCjYosRKSTiQQPcFq7qQK1aXpbpgXRyWCGwAtid8+pAwHXyVFMbV1Q4AlZ2w/2XyQ7kUNybcwFDfCF0C/rrWqip/rfozF2mDfoLzA/+ryFtqCXe5XeJgKSAHgsbNLi5YXR0ZPPGXparARJAbSSBy+8+Pjs2pEqFzHH8/f9/P+LAQA=" alt="brand" />
                    <span>برند</span>
                </div>
                <div class="ts-column ts-col-4" id="ts-search-tab-car" data-tab="car">
                    <img src="data:image/webp;base64,UklGRlwCAABXRUJQVlA4TE8CAAAvNgALEK/EqG0jQca9/z3g1ywHMmmb6O6/6SaTtonu/ptuBG3bNrYk26/AbRtlx1D6xt3m1Hw/AEDwNzQcLA6sYSGAEOCCmxcsegwhBBCAm7F4EGBnBs125gaAnZ8oWBwAMCYaCiIA0HD4sCEhzD0KDgIAaLdtF5Juj23btm3btm3b9kz+b3UlnVc1/hjR/zT8R/BVmaZJLvjUO9Pnlwp8iXn2awq+pn8eXxPz7o4vMTsux9c07OFrAlgIvmarBboji0TIS24nhp2hx2GB3d8JkLu8LbfbQ8/4WTjEUGkQpoegK/QjCSZM+h6Y9egBPbPrMHWS2sF8eww6olksNEe8x0D76hx0DO1aQJOLNRI+wqDD9aEQtEXFOXuaOZyHZv/0DLvWZZBmk4/1MQXjN+wkHyPzImTey+zhOir3BGThSwRU87DqZNT0ifNiERSXs4UgGHNOQa71Q0OzGAOlc98Kas4pyJtCn5l5ZTQNJlahRkjOuuONcZY5pyBvity6+pT5jw6IecwIyRXjCTmnII/LwFM/EiGYe/spoHNOQe7XWpZWqhe9kPiJtlA8/VRfs5xTkGutjhs7vBwSJvYijglJOacgZ3shMW/qE/yE01LU7/ip3mY5pyAnxiDxYpvzHNyFhWKpDULOKcjBKUg8WTB4H59iA33PK33C4inIzhVIzItswCfIOdYAsvEgVAMkVuDBzAFkMdMCyUoR1GDmANJ8ZMmPhmS/CmowcwDdMw2eEA9N+5NFah1zAN1zOcFPx6Bp4EjYsQSdOCFm4OsNvyMA" alt="car" />
                    <span>خودرو</span>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="ts-row ts-col-gap-10">

                <!-- Tab: Specs -->
                <div class="ts-column ts-col-12 ts-search-content ts-search-content-specs"
                     id="ts-search-content-specs" data-tab="specs">
                    <div class="ts-row ts-col-gap-5">
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>سایز:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Size" name="size" class="ts-filter-specs-size">
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>فاق:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Aspect Ratio" name="aspectRatio" class="ts-filter-specs-aspectRatio">
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>پهنا:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Width" class="ts-filter-specs-width">
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-12 ts-search-img-box">
                            <img src="data:image/webp;base64,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" alt="specs" />
                        </div>
                    </div>
                    <div class="ts-column ts-col-12">
                        <button type="button" class="ts-search-submit"
                                id="ts-search-submit-bySpecs">جستجو</button>
                    </div>
                </div>

                <!-- Tab: Brand -->
                <div class="ts-column ts-col-12 ts-search-content ts-search-content-brand"
                     id="ts-search-content-brand" data-tab="brand">
                    <div class="ts-row ts-col-gap-10 ts-search-content-brand-wrap">

                        <div class="ts-column ts-col-12">
                            <a href="<?php echo home_url( 'product-brands' ); ?>" class="ts-search-submit-wrap">
                                <button type="button" class="ts-search-submit"
                                        id="ts-search-submit-byBrand">نمایش همه برند ها</button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tab: Car -->
                <div class="ts-column ts-col-12 ts-search-content ts-search-content-car"
                     id="ts-search-content-car" data-tab="car">
                    <div class="ts-row ts-col-gap-5">
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>نام برند:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Brand" name="brand" class="ts-search-brand">
                                        <option value="">همه</option>
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>مدل ماشین:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Model" name="model" class="ts-search-model">
                                        <option value="">همه</option>
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-4">
                            <div class="ts-search-select-box">
                                <label>سال تولید:</label>
                                <div class="ts-select2 ts-select-100p">
                                    <select title="Year" name="year" class="ts-search-year">
                                        <option value="">همه</option>
                                    </select>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ts-column ts-col-12">
                            <button type="button" class="ts-search-submit"
                                    id="ts-search-submit-byCar">جستجو</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
