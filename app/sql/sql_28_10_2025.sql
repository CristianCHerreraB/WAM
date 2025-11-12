/*Se agrega el campo id_ejecucion a la tabla cal_juez*/
ALTER TABLE cal_juez
ADD COLUMN id_ejecucion INT;

/*login*/
ALTER TABLE [dbo].[usuarios]
ADD 
    [user_facebook] VARCHAR(255) NOT NULL,
    [user_instagram] VARCHAR(255) NOT NULL,
    [user_x] VARCHAR(255) NOT NULL,
    [telefono] VARCHAR(20) NOT NULL,
    [genero] VARCHAR(10) NOT NULL,
    [edad] INT NOT NULL;