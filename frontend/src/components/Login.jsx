import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';
import Container from 'react-bootstrap/Container';
import * as formik from 'formik';
import * as yup from 'yup';
import './Login.css'

const Login = () => {
	const { Formik } = formik;
	const schema = yup.object().shape({
		email: yup.string()
			.required('Please enter an email')
			.email('Please input a valid email'),
		password: yup.string()
			.required('Please enter your password')
			.min(8, 'Password is too short - should be 8 chars minimum.')
			.matches(/[a-zA-Z]/, 'Password can only contain Latin letters.')
	});
	return (
		<Container
			style={{ maxWidth: 650 }}
			className='d-flex flex-column justify-content-center align-items-center vh-100' >
			<h1 className='fs-3 mb-4'>Login Form</h1>
			<Formik
				validationSchema={schema}
				onSubmit={(values) => {
					console.log(values)
				}}
				initialValues={{
					email: '',
					password: ''
				}}>
				{({ handleSubmit, handleChange, values, touched, errors }) => (
					<Form noValidate onSubmit={handleSubmit} className='w-50'>
						<Form.Group className="w-100 mb-3" controlId="formBasicEmail">
							<Form.Label>Email address</Form.Label>
							<Form.Control
								type="email"
								name="email"
								value={values.email}
								onChange={handleChange}
								isInvalid={touched.email && !!errors.email}
								isValid={touched.email && !errors.email}
								placeholder="Enter email"
							/>
							<Form.Control.Feedback type="invalid">
								{errors.email}
							</Form.Control.Feedback>
						</Form.Group>

						<Form.Group className="w-100 mb-3" controlId="formBasicPassword">
							<Form.Label>Password</Form.Label>
							<Form.Control
								type="password"
								name="password"
								value={values.password}
								onChange={handleChange}
								isValid={touched.password && !errors.password}
								isInvalid={touched.password  && !!errors.password}
								placeholder="Password" />
							<Form.Control.Feedback type="invalid">
								{errors.password}
							</Form.Control.Feedback>
						</Form.Group>
						<Button variant="primary" type="submit" className='w-100'>
							Submit
						</Button>
					</Form>
				)}

			</Formik>

		</Container>
	)
}

export default Login;