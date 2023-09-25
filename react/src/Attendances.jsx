import React from "react";
import { useState, useEffect } from 'react'
import http from './http';

export default function Attendances() {
    const [attendances, setAttendance] = useState([]);

    useEffect(() => {
        fetchAllAttendances();
    }, []);

    const fetchAllAttendances = () => {

        http.get('/get-attendances').then(response => {

            console.log(response)
            setAttendance(response.data)
        });
    }

    return(
        <div className="container table-responsive py-5">
            <div className="card">
                <div className="card-header bg-white">
                    <div className="card-title fw-bold">Attendance List</div>
                </div>
                <div className="card-body">
                    <table className="table table-bordered table-hover">
                        <thead className="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Checkin</th>
                            <th scope="col">Checkout</th>
                            <th scope="col">Total Working Hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            {attendances.map(attendance => {
                                <tr key={attendance.id}>
                                    <th scope="row">{attendance.id}</th>
                                    <td>{attendance.employee.name}</td>
                                    <td>{attendance.check_in}</td>
                                    <td>{attendance.check_out}</td>
                                    <td>{attendance.hours}</td>
                                </tr>
                            })}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}
